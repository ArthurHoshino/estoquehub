<?php

class CreateEstoqueTable {
    function up($pdo) {
        $pdo->exec("
            CREATE TABLE CDESTOQUE(
                CDESTUSUARIOID INT UNSIGNED,
                CDESTPRODID INT UNSIGNED,
                CDESTQTDPROD INT NOT NULL,

                FOREIGN KEY (CDESTUSUARIOID) REFERENCES CDUSUARIO(CDUSID),
                FOREIGN KEY (CDESTPRODID) REFERENCES CDPRODUTO(CDPRODID)
            )
        ");
    }

    function down($pdo) {
        $pdo->exec("DROP TABLE CDESTOQUE");
    }
}
