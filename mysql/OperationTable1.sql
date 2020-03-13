 1 task
DROP TABLE IF EXISTS documents_tmp;
CREATE TEMPORARY TABLE documents_tmp
SELECT * FROM documents;


DESCRIBE documents_tmp;

ALTER TABLE documents_tmp
ADD dcm_type INT DEFAULT 10;


SELECT * FROM documents_tmp;


