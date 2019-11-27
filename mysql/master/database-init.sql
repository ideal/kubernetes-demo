CREATE TABLE `user` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'uid',
  `name` varchar(128) NOT NULL DEFAULT '',
  `intro` longtext NOT NULL COMMENT 'intro',
  `gmt_create` datetime NOT NULL DEFAULT '2016-12-23 12:00:00' COMMENT '创建时间',
  `gmt_modified` datetime NOT NULL DEFAULT '2016-12-23 12:00:00' COMMENT '修改时间',
  `user_type` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='user';

