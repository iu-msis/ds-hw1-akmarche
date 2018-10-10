use hw1;

DROP TABLE IF EXISTS homework_table;

CREATE TABLE homework_table (
  id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
  comment VARCHAR(500) NOT NULL
);

INSERT INTO homework_table (id, comment)
VALUES (1, 'hello hello');
