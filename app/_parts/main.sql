"CREATE Table datas(
id INT NOT NULL AUTO_INCREMENT,           
title TEXT,
description VARCHAR(140),
is_done BOOL DEFAULT false,
PRIMARY KEY (id)
)"



"INSERT INTO datas (title,description,is_done) 
VALUES 
('title1','description',true), 
('title2','description2',false), 
('title3','description3',false)"