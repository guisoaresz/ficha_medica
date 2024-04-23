<?php

    include 'inc/conexao.php';

    function headerTemp(){
        echo '<!DOCTYPE html>
        <html lang="pt-br">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="estilos/estilos.css">
                <title>Ficha Médica</title>
            </head>';
    }

    function footerTemp(){
        echo '</html>';
    }

    function getFicha($id){
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE idUsuario = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if(!empty($res)){
            foreach($res as $rows){
                $fotoUsuario = $rows['fotoUsuario'];
                $nomeUsuario = $rows['nomeUsuario'];
                $idadeUsuario = $rows['idadeUsuario'];
                $doadorUsuario = $rows['doadorUsuario'];
                if($doadorUsuario == 1){
                    $doadorUsuario = "Doador(a) de órgãos <br>";
                } else {
                    $doadorUsuario = "";
                }
                $tipoSanguineo = $rows['tipoSanguineoUsuario'];
                $alturaUsuario = $rows['alturaUsuario'];
                $pesoUsuario = $rows['pesoUsuario'];

                echo '<body>
                        <div class="container">
                            <div class="pacienteMain">
                                <b>Ficha Médica</b><br>
                                <img src="pacientes/'. $fotoUsuario .'" alt="Foto do paciente"><br>
                                <b>'. $nomeUsuario .'</b><br>
                                '. $idadeUsuario .' anos<br>
                                '. $doadorUsuario .'
                                Tipo sanguíneo: '. $tipoSanguineo .'<br>
                                Altura: '. $alturaUsuario .'m<br>
                                Peso: '. $pesoUsuario .'kg
                            </div>
                            <div class="divisoria">
                                <hr>
                            </div>';

                        // Contatos de emergência

                        $stmt = $conn->prepare("SELECT * FROM contatos WHERE idUsuario = :id");
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        
                           $stmt->execute();
                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $qtdResultados = $stmt->rowCount();

                        echo '<div class="pacienteContatosContainer">';
                        if(!empty($res)){
                            echo '<b>Contatos de emergência ('. ($qtdResultados) .') </b><br>';
                            $count = 0;
                            foreach($res as $rows){
                                $nomeContato = $rows['nomeContato'];
                                $grauParentesco = $rows['grauParentescoContato'];
                                $numeroContato = $rows['numeroContato'];

                                echo '<div class="pacienteContato">' .$nomeContato .' ('. $grauParentesco .')<br>
                                '. formataNumero($numeroContato) .'</div>';

                                $count++;
                                if($count<$qtdResultados){
                                    echo '<br>';
                                }
                            }
                        } else {
                            echo '<b>Contatos de emergência</b><br>
                            Nada relatado.';
                        }

                        echo '</div>
                              <div class="divisoria">
                                <hr>
                              </div>';

                        // Problemas de saúde

                        $stmt = $conn->prepare("SELECT * FROM problemas_saude WHERE idUsuario = :id");
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        
                        $stmt->execute();
                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $qtdResultados = $stmt->rowCount();

                        echo '<div class="pacienteProblemasContainer">';
                        if(!empty($res)){
                            echo '<b>Problemas de saúde ('. ($qtdResultados) .') </b><br><ul>';
                            $count = 0;
                            foreach($res as $rows){
                                $infoProblema = $rows['infoProblema'];

                                echo '<div class="pacienteProblema"><li>' .$infoProblema .'';

                                $count++;
                                if($count<$qtdResultados){
                                    echo ';';
                                } else {
                                    echo '.';
                                }
                                echo '</li></div>';
                            }
                        } else {
                            echo '</ul><b>Problemas de saúde</b><br>
                            Nada relatado.';
                        }

                        echo '</div>
                                <div class="divisoria">
                                <hr>
                            </div>';

                        // Medicamentos

                        $stmt = $conn->prepare("SELECT * FROM medicamentos WHERE idUsuario = :id");
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        
                        $stmt->execute();
                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $qtdResultados = $stmt->rowCount();

                        echo '<div class="pacienteMedicamentosContainer">';
                        if(!empty($res)){
                            echo '<b>Medicamentos ('. ($qtdResultados) .') </b><br><ul>';
                            $count = 0;
                            foreach($res as $rows){
                                $nomeMedicamento = $rows['nomeMedicamento'];
                                $dosMedicamento = $rows['dosMedicamento'];

                                echo '<div class="medicamentoProblema"><li>'. $nomeMedicamento . ', '. $dosMedicamento . 'g';

                                $count++;
                                if($count<$qtdResultados){
                                    echo ';';
                                } else {
                                    echo '.';
                                }
                                echo '</li></div>';
                            }
                            } else {
                                echo '</ul><b>Medicamentos</b><br>
                                Nada relatado.';
                            }

                            echo '</div>
                            <div class="divisoria">
                                <hr>
                            </div>';

                        // Notas

                        $stmt = $conn->prepare("SELECT * FROM notas WHERE idUsuario = :id");
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        
                        $stmt->execute();
                        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $qtdResultados = $stmt->rowCount();

                        echo '<div class="pacienteNotasContainer">';
                        if(!empty($res)){
                            echo '<b>Notas médicas ('. ($qtdResultados) .') </b><br><ul>';
                            $count = 0;
                            foreach($res as $rows){
                                $infoNotas = $rows['infoNota'];

                                echo '<div class="notaProblema"><li>'. $infoNotas;

                                $count++;
                                if($count<$qtdResultados){
                                    echo ';';
                                } else {
                                    echo '.';
                                }
                                echo '</li></div>';
                            }
                            } else {
                                echo '</ul><b>Notas médicas</b><br>
                                Nada relatado.';
                            }
            }
            echo '</div>
                  <div class="divisoria">
                     <hr>
                  </div>
                </div>
         </body>
         <div class="footer">Ficha Médica ©, 2024</div>';

        } else {
            echo "Não existe nenhuma ficha médica com o ID solicitado.";
        }
    }

    function formataNumero($numero) {
        $numero = preg_replace("/[^0-9]/", "", $numero);
        
        $codigo_pais = '';
        if (strlen($numero) > 10) {
            $codigo_pais = '+' . substr($numero, 0, strlen($numero) - 11);
            $numero = substr($numero, -11);
        }
        return $codigo_pais . ' (' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 5) . '-' . substr($numero, 7);
    } 
?>