CREATE TABLE likes_storage (
like_id        INT NOT NULL AUTO_INCREMENT,
like_type        INT(255) NOT NULL default '0',
like_by_user_id        INT(255) NOT NULL default '0',
like_post_id        INT(255) NOT NULL default '0',
PRIMARY KEY (like_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;