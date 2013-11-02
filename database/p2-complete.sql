/*-------------------------------------------------------------------------------------------------
Includes table structure and sample data

This will drop existing posts, users and users_users table if you have them.

Each user's password matches their first name, all lowercase. 
Ex: Sam's password is "sam"

In order for this to work, you have to use the same SALTS in your app that were used to generate
this data:

/app/config/config.php:

	define('PASSWORD_SALT', 'f[]3jkuoZqoQML9ugo8Nc6Rh+Y7}ZjKx<RyrG<EN');
	define('TOKEN_SALT', 'VG6v@qgKvhUBWYmFf,aNTXkA93:<T/R92{QihsPZ');

-------------------------------------------------------------------------------------------------*/

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `users_users`;
CREATE TABLE `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'follower',
  `user_id_followed` int(11) NOT NULL COMMENT 'followed',
  PRIMARY KEY (`user_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`) VALUES
(1, 1382587237, 0, '1f81139e9127565c43fd5c1f3c786d59f34d14cc', 'c04da1a8a57d8d7cd81a2aa8f55a2dbe833d866d', 0, '', 'Sam', 'Seaborn', 'sam@whitehouse.gov'),
(2, 1382587246, 0, '6ce36b057e1a17bb51add2c51a82e85cb9f421dc', '777c8c084052831d4f6792a580142cfc359fd945', 0, '', 'Donna', 'Moss', 'donna@whitehouse.gov'),
(3, 1382587258, 0, 'fb735f1888dc60e656f6b61261b36a84cdd9edf3', '2da908d5c171567c5033b5a44eeedd88eadccdc6', 0, '', 'Toby', 'Ziegler', 'toby@whitehouse.gov'),
(4, 1382587269, 0, '161e0f31839869d78fe6c4d99219de08fbf6fab1', '597de90230cae1e03080ec424f7fd57d60a0ca0d', 0, '', 'CJ', 'Cregg', 'cj@whitehouse.gov');

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(1, 1382587640, 1, 2),
(2, 1382587662, 2, 1),
(3, 1382587663, 2, 2),
(4, 1382587664, 2, 3),
(5, 1382587664, 2, 4),
(6, 1382587709, 3, 1);

INSERT INTO `posts` (`post_id`, `created`, `modified`, `user_id`, `content`) VALUES
(1, 1382587331, 1382587331, 1, 'Education is the silver bullet. Education is everything. We don''t need little changes, we need gigantic, monumental changes. Schools should be palaces. The competition for the best teachers should be fierce. They should be making six-figure salaries. Schools should be incredibly expensive for government and absolutely free of charge to its citizens, just like national defense. That''s my position. I just haven''t figured out how to do it yet. '),
(2, 1382587349, 1382587349, 1, 'Over the past half century, we''ve split the atom, we''ve spliced the gene and we''ve roamed Tranquility Base. We''ve reached for the stars and never have we been closer to having them in our grasp. New science, new technology is making the difference between life and death, and so we need a national commitment equal to this unparalleled moment of possibility. And so I announce to you tonight that I will bring the full resources of the Federal Government and the full reach of my office to this fundamental goal: We will cure cancer by the end of this decade. '),
(3, 1382587402, 1382587402, 2, 'Cause those large clocks on the wall that are run by the US Navy say your watch sucks. In fact they say your watch sucks in four different time zones.'),
(4, 1382587439, 1382587439, 2, 'Air Force One undergoes maintenance every day, whether the plane''s gonna be flying or not. Every 154 days, the plane''s completely taken apart and put back together again. 24 hours before wheels-up, fuel is sealed in a tank truck and guarded by sharpshooters. One hour before wheels-up, Air Force specialist drain off a gallon and analyze it for purity and the right levels of octane and water. The wiring - and this is gonna be an area - is shielded to protect it from a thermonuclear blast. If you want to sabotage it, you have to get by 48 armed members of the Air Lift Security Unit or join the maintenance crew, which takes 12 years after a two-year background check. \r\n'),
(5, 1382587511, 1382587511, 3, 'For 90 minutes that night, there was a coup dՎtat in this country.'),
(6, 1382587607, 1382587607, 1, 'No, honestly, I am dumb. Most of the time I''m playing smart.');

ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `users_users`
  ADD CONSTRAINT `users_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;