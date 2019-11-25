CREATE TABLE `user` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'uid',
  `name` varchar(128) NOT NULL DEFAULT '',
  `intro` longtext NOT NULL COMMENT 'intro',
  `gmt_create` datetime NOT NULL DEFAULT '2019-05-05 00:00:00' COMMENT '创建时间',
  `gmt_modified` datetime NOT NULL DEFAULT '2019-05-05 00:00:00' COMMENT '修改时间',
  `user_type` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin COMMENT='user';

