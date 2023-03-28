<?php               
                    $dbhost = "localhost";
                    $dbuser = "root";
                    $dbpass = "";
                    $dbname = "mangaengrish";
                    
                    
                    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
                    {
                        die("failed to connect into database!");
                    }
    
                    $sql = "SELECT artigos.nomeartigo, artigos.modelo, artigos.genero, artigos.codartigo, volumes.codvolume, volumes.codartigo, volumes.numvolume, volumes.img1, volumes.precovenda, volumes.quantidadestock, volumes.sinopse, carrinho.codvolume FROM volumes inner join artigos on artigos.codartigo=volumes.codartigo inner join carrinho on carrinho.codvolume=volumes.codvolume where volumes.codvolume='3'";
                    $store_data=mysqli_query($con, $sql);
                    
                    if($store_data)
                    {
                        
                        if($store_data && mysqli_num_rows($store_data) > 0)
                        {
                            foreach($store_data as $row){
                               echo $row["carrinho.codvolume"];
                            }
                        }
                        else
                        {
                            echo 0;
                        }
                    }
                    ?>