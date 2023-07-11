SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `info` (
  `infoID` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `comicID` int(11) NOT NULL,
  PRIMARY KEY (`infoID`),
  KEY `comicID` (`comicID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

INSERT INTO `info` (`infoID`, `text`, `comicID`) VALUES
(1, '<p>Guest comic by Hugo Hall</p>', 139),
(2, '<p>Guest comic by Kovier of <a href="http://theoryofpeople.blogspot.com">Theory of People</a></p>', 84),
(3, '<p>When I came up with this comic, I thought two things: 1) This is hilarious. 2) There is no way someone has not done this joke already. Well, someone has done the joke, but I did it anyway because I like my twist and how it ties into the new euphemisms. What will they think of next?</p>', 246),
(4, '<p>As bad as that sounds, it is still better than "My Own Worst Enemy" starring Christian Slater.</p>', 447),
(5, '<p>This is dedicated to my friend Justin.</p>', 536),
(6, '<p>Guest comic by Stevie!</p>', 678),
(7, '<p>An essay on this topic: <a href="http://www.agnoiology.com/2011/03/18/dynamite-and-the-terror-within-a-terrorists-psyche/">"Dynamite" and the Terror within a Terrorist''s Psyche</a></p>', 688),
(8, '<p>This comic was inspired by the "touristification" concept created by <a href="https://www.facebook.com/pages/Nassim-Nicholas-Taleb/13012333374">Nassim Nicholas Taleb</a>.</p>', 834),
(9, '<p>Dear Internets: I feel like I might''ve read this somewhere before. I did a cursory google search, but I didn''t find anything. If you find a tweet or a comic where someone has done this, let me know so I can remove this comic or get permission to write it. Thanks.</p>', 850),
(10, '<p>Since a couple people asked on facebook, I decided I should probably put some type of formal announcement here. I have been having health issues, which is why I haven''t updated the comic for a while. I don''t have any timetable on when I will return to regular updates.<p>\r\n\r\n<p>I still have the energy to tweet, so follow @chalkboardman if you enjoy me being occasionally funny.</p>', 861),
(11, '<p>I drew each panel using <a href="http://www.fiftythree.com/paper">Paper</a> on the iPad, while laying in bed when I was still recuperating.</p>', 863),
(12, '<p>This is the first in a batch of comics for <a href="http://www.hourlycomic.com/content/hourlycomicday">Hourly Comic Day</a>. I originally posted them on twitter. I''ll be posting them here everyday for a couple weeks.</p>', 866),
(13, '<p>After much physical pain and illness, I am well enough to start updating again. Still not 100%. I missed this.</p>', 862),
(14, '<p>Once upon a time, I started desiring to do something more ambitious than stick figures and one-liners. This comic is my first real step towards that. This has to be my most ambitious comic yet, something I wouldn''t have attempted a year ago. And yet, it still looks like crap, haha. I just have to work harder and be patient. Anyway, hope you enjoy it.</p>', 889);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
