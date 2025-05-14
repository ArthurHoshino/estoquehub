<?php

class CreateProdutoTable {
    function up($pdo) {
        $pdo->exec("
            CREATE TABLE CDPRODUTO(
                CDPRODID INT UNSIGNED AUTO_INCREMENT,
                CDPRODNOME VARCHAR(100) NOT NULL,
                CDPRODDESC VARCHAR(200) NOT NULL,
                CDPRODPRECO DECIMAL(10, 2) NOT NULL,

                PRIMARY KEY (CDPRODID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE CDPRODUTO");
    }
}
