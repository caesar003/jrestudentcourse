ALTER TABLE `students` add `grp` varchar(255) not null after `pin` ADD `cnst2` varchar(255) not null after `complete_name`, ADD `cnst3` varchar(255) not null after `cnst2`, add `cnst4` varchar(255) not null after `cnst3`, add `nnst2` varchar(255) not null after `nick_name`, add `nnst3` varchar(255) not null after `nnst2`, add `nnst4` varchar(255) not null after `nnst3`, add `adrst2` varchar(255) not null after `address`, add `adrst3` varchar(255) not null after `adrst2`, add `adrst4` varchar(255) not null after `adrst3`, add `pobst2` varchar(255) not null after `place_of_birth`, add `pobst3` varchar(255) not null after `pobst2`, add `pobst4` varchar(255) not null after `pobst3`, add `dobst2` datetime after `date_of_birth`, add `dobst3` datetime after `dobst2`, add `dobst4` datetime after `dobst3`, add `phst2` varchar(255) not null after `phone`, add `phst3` varchar(255) not null after `phst2`, add `phst4` varchar(255) not null after `phst3`;