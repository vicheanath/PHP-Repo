-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 09:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stage17_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE IF NOT EXISTS `tbl_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id`, `url`, `img`, `location`, `type`, `status`) VALUES
(1, 'http://reanweb.com/', 'img/1571469761895630.gif', 2, 1, 1),
(2, 'https://www.facebook.com/', 'img/1571469799129677.jpg', 1, 1, 1),
(3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/eOcCINxmgxg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '', 2, 2, 1),
(4, '<iframe width="560" height="315" src="https://www.youtube.com/embed/MPCG6G1HlY4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '', 1, 2, 1),
(5, '<iframe width="560" height="315" src="https://www.youtube.com/embed/MPCG6G1HlY4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', '', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `od` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `img`, `od`, `status`) VALUES
(1, 'កម្សាន្ត', '', 1, 1),
(2, 'កីឡា', '', 2, 1),
(3, 'បច្ចេកវិទ្យា', '', 3, 1),
(4, 'សង្គម', 'img/157025810710172.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_post` datetime NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `od` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `date_post`, `title`, `des`, `img`, `od`, `location`, `menu_id`, `title_link`, `user`, `view`, `status`) VALUES
(1, '2019-10-05 01:48:59', 'asdfsadfsadfsadf askdfjkas df;lsad flsa dfsadf', '<p>កូន​សិស្ស​លោក​ ស៊ន​ អេលីត​ រូប​នេះ​ព្យាយាម​វ៉ៃ​តាម​បច្ចេកទេស​ដែល​ខ្លួន​បាន​រៀន​ និង​បទ​ពិសោធ​កន្លង​ទៅ​កាល​នៅ​កម្ពុជា។​ អ្នក​លេង​គុន​ខ្មែរ​ខាង​លើ​ វ៉ៃ​ដក​ៗ​យក​ពិន្ទុ​ពី​មួយ​ទឹក​ទៅ​មួយ​ទឹក​ និង​មិន​ឈរ​ប្ដូរ​ជា​មួយ​កីឡាករ​ម្ចាស់ផ្ទះ​ឡើយ​ រហូត​ចប់​៥ទឹក​ឈ្នះ​ដោយ​ពិន្ទុ។​ រំលឹក​ដែរ​ថា​ អ្នក​លេង​គុន​ខ្មែរ​ អេលីត​ ភក្កី​ យក​ឈ្នះ​ពិន្ទុ​លើ​កីឡាករ​ម្ចាស់​ផ្ទះ​មីយ៉ាន់ម៉ា​ Shuklaine Min ​ មុន​នេះ​លើ​សង្វៀន​ប្រដាល់​ WLC៕​</p>\r\n<p><img src="http://localhost/stage17/project/admin/img/157025810710172.jpg" alt="" width="494" height="329" /></p>', 'img/1570258138406316.jpg', 1, 1, 4, 'asdfsadfsadfsadf-askdfjkas-df-lsad-flsa-dfsadf', 1, 3, 1),
(2, '2019-10-05 02:19:15', 'Apple ​បើក​​ជួសជុល​ឲ្យ​មិន​យក​លុយ​ ​បើ iPhone 6s មិន​ដំណើការ', '<p>កាលពីពេលថ្មីៗថ្មី ក្រុមហ៊ុន​បច្ចេកវិទ្យាយក្ស Apple បានចេញសេចក្ដីប្រកាសពីដំណឹងល្អមួយ ដែលសំដៅដល់ស្មាតហ្វូនជំនាន់ចាស់របស់ខ្លួន (serial number ចេញចាប់ពីខែតុលាឆ្នាំ ២០១៨ ដល់សីហា ២០១៩) ជាពិសេស ករណី iPhone 6s/6S Plus អាប់ដែតជំនាន់ iOS 13 ឬខ្ពស់ជាងនេះឡើងទៅ បើកម៉ាស៊ីនមិនដំណើការ ក្រុមហ៊ុននឹងជួសជុលមិនយកប្រាក់នោះទេ។</p>\r\n<p><img src="http://localhost/stage17/project/admin/img/157025993865439.jpg" alt="" width="597" height="399" /></p>', 'img/157025993865439.jpg', 2, 1, 1, 'Apple-បើក-ជួសជុល-ឲ្យ-មិន-យក-លុយ-បើ-iPhone-6s-មិន-ដំណើការ', 1, 0, 1),
(3, '2019-10-05 02:30:46', 'ក្រុមហ៊ុន​ធានារ៉ាប់រងដ៏ធំនៅស្រុកខ្មែរ ឈ្នះ​ពាន់​លេខ​ ១ ​​ប្រចាំ​អាស៊ី លើក​ផ្នែក​សេវា​កម្ម និងទំនួលខុសត្រូវក្នុងសង្គម', '<p>​ក្រុម​ហ៊ុន​ធានារ៉ាប់រងអាយុជីវិត មេនូឡាយហ្វ៍​ ដែល​ឈរ​ជើង​នៅ​ប្រទេស​កម្ពុជាជា​ច្រើន​ឆ្នាំ​មក​ហើយ​នោះ​ ​បាន​​ទទួល​ចំណាត់​ថ្នាក់​លេខមួយ​ ព្រម​ទាំង​ឈ្នះ​ពាន​រង្វាន់​កិត្តិយស​អន្តរជាតិ​នៅ​តំបន់​អាស៊ី​ថែម​ទៀត​ផង​កាល​ពី​ពេលថ្មីៗនេះ។</p>\r\n<div class="hide-line-spacing ads-intext"><hr /><label>ពាណិជ្ជកម្ម</label>\r\n<div id="sas_44269">&nbsp;</div>\r\n<div id="beacon_40b6e0a8c8"><img src="http://ads.sabay.com/openx/www/delivery/lg.php?bannerid=44377&amp;campaignid=12184&amp;zoneid=625&amp;loc=http%3A%2F%2Fnews.sabay.com.kh%2Farticle%2F1167904&amp;cb=40b6e0a8c8" alt="" width="0" height="0" /></div>\r\n</div>\r\n<p>ការ​ទទួល​ស្គាល់​​នេះ បាន​ធ្វើ​ឡើង​ក្នុង​កម្មវិធី​​ប្រគល់​ពាន​របស់ The Asia Corporate Excellence &amp; Sustainability ( ACES) នៅ​ទីក្រុង​បាងកក កាល​ពី​ខែ​កញ្ញា​កន្លង​ទៅ​ ដោយបាន​ផ្ដល់​ឲ្យ​ក្រុម​ហ៊ុនមេននូឡាយហ្វ៍ ខេមបូឌា នូវ​ពាន​រង្វាន់​នេះ​ផ្ដោត​សំខាន់​លើ​ការ​ផ្ដល់​សេវាកម្ម​ និង​សមិទ្ធផល​នានា ដែល​បង្ហាញ​ពី​ទំនួល​ខុស​ត្រូវ​ខ្ពស់​របស់​ស្ថាប័ន​ក្នុង​សកម្មភាព​សង្គម។</p>\r\n<p><img src="http://localhost/stage17/project/admin/img/15702606268585.jpg" alt="" width="616" height="409" /></p>\r\n<p>&nbsp;</p>', 'img/15702606268585.jpg', 3, 1, 4, 'ក្រុមហ៊ុន-ធានារ៉ាប់រងដ៏ធំនៅស្រុកខ្មែរ-ឈ្នះ-ពាន់-លេខ-១-ប្រចាំ-អាស៊ី-លើក-ផ្នែក-សេវា-កម្ម-និងទំនួលខុសត្រូវក្នុងសង្គម', 1, 4, 1),
(4, '2019-10-05 02:31:49', 'ក្រុម​ជម្រើស​ជាតិ​អឺរ៉ុប​មួយ ​រើស​ដោយ​ព្រះ​មហាក្សត្រ​ផ្ទាល់​តែ​ម្ដង​សម្រាប់ World Cup', '<p>&nbsp;</p>\r\n<p>ជា​ធម្មតា​ក្រុម​ជម្រើស​ជាតិ​ជ្រើសតាំង​ដោយ​គ្រូ​បង្វឹក​ ដោយឡែក​ក្រុម​ជម្រើស​ជាតិ​រ៉ូម៉ានី​វិញ ត្រូវ​បាន​ចាត់​តាំង​ ដោយ​ព្រះមហាក្សត្រ​ផ្ទាល់​តែ​ម្ដង​ សម្រាប់​ព្រឹត្តិការណ៍​ FIFA World Cup 1930 ដែល​លេង​នៅ​អ៊ុយរុយហ្គាយ។</p>\r\n<div class="hide-line-spacing ads-intext"><hr /><label>ពាណិជ្ជកម្ម</label>\r\n<div id="sas_44269">&nbsp;</div>\r\n<div id="beacon_af6e2c4fea"><img src="http://ads.sabay.com/openx/www/delivery/lg.php?bannerid=44377&amp;campaignid=12184&amp;zoneid=625&amp;loc=http%3A%2F%2Fnews.sabay.com.kh%2Farticle%2F1167934&amp;cb=af6e2c4fea" alt="" width="0" height="0" /></div>\r\n</div>\r\n<p>ព្រះបាទ Carol II ឡើង​សោយរាជ្យ​ភ្លាម (ខែ​មិថុនា ១៩៣០) ទ្រង់​សម្រេច​ដាក់​រាជាណាចក្រ​រ៉ូម៉ានី​លេង World Cup ភ្លែត​។ ព្រះអង្គ​បាន​លើកលែង​ទោស​នូវ​កីឡាករ​បាល់ទាត់​ណា ដែល​ជាប់​បម្រាម។ ក្រោយ​មក ទ្រង់​ជ្រើសរើស​ក្រុម​ដោយ​ផ្ទាល់​ព្រះអង្គ​តែ​ម្ដង (៣ថ្ងៃ​មុន​ថ្ងៃ​កំណត់​របស់​ FIFA)។</p>\r\n<p style="text-align: center;"><img src="http://localhost/stage17/project/admin/img/1570260679154274.jpg" alt="" width="591" height="332" /></p>\r\n<p>&nbsp;</p>', 'img/1570260679154274.jpg', 3, 1, 2, 'ក្រុម-ជម្រើស-ជាតិ-អឺរ៉ុប-មួយ-រើស-ដោយ-ព្រះ-មហាក្សត្រ-ផ្ទាល់-តែ-ម្ដង-សម្រាប់-World-Cup', 1, 0, 1),
(5, '2019-10-05 02:32:54', 'Toyota ចេញ​រថយន្ត Rush TRD ស៊េរី ២០២០ តម្លៃ​ជាង ៣ម៉ីន​ដុល្លារ​', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">Toyota បាន​បញ្ចេញ​រថយន្ត​ប្រភេទ Mini SUV ម៉ូដែល Rush TRD ស៊េរី​ឆ្នាំ ២០២០ ដែល​ជា​រថយន្ត​កូនកាត់​ផលិត​នៅ​រោងចក្រToyota ឥណ្ឌូណេស៊ី​នេះ​ ដែល​បាន​អភិវឌ្ឍ​ទាំង​រូបរាង​និង​បច្ចេកទេស​យ៉ាង​ល្អ​ឥត​ខ្ចោះ និង​​កាន់​តែ​ទំនើប​ជាង​មុន។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260742764955.jpg" alt="" width="591" height="394" /></p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p>&nbsp;</p>', 'img/1570260742764955.jpg', 3, 1, 3, 'Toyota-ចេញ-រថយន្ត-Rush-TRD-ស៊េរី-២០២០-តម្លៃ-ជាង-៣ម៉ីន-ដុល្លារ-', 1, 0, 1),
(6, '2019-10-05 02:33:52', 'តារា​ស្រី​ថៃ​កំពូល​​ម្នាក់​មក​ដល់​កម្ពុជា​ដោយ​មាន​កង​អង្គរក្ស​មាឌឌាំង​ច្រូងច្រាង', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">តារា​ស្រី​កំពូល​ម្នាក់​របស់​ថៃ បាន​មក​ដល់​ប្រទេស​កម្ពុជា​នា​ព្រឹក​នេះ នៅ​ប្រលាន​យន្តហោះ​ភ្នំពេញ​អន្តរជាតិ ដោយ​មាន​ទាំង​កង​អង្គរក្ស​មាន​ឌាំង​មួយ​ក្រុម​អម​ដំណើរ​ដើម្បី​សុវត្ថិភាព​របស់​នាង​ផង។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570260809582950.jpg', 3, 2, 1, 'តារា-ស្រី-ថៃ-កំពូល-ម្នាក់-មក-ដល់-កម្ពុជា-ដោយ-មាន-កង-អង្គរក្ស-មាឌឌាំង-ច្រូងច្រាង', 1, 0, 1),
(7, '2019-10-05 02:34:34', 'ទើបរៀបការរួច Justin Bieber ចេញបទចម្រៀងថ្មី យកប្រពន្ធមកដើរតួជាមួយទៀត', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">បទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570260873478887.jpg', 3, 1, 1, 'ទើបរៀបការរួច-Justin-Bieber-ចេញបទចម្រៀងថ្មី-យកប្រពន្ធមកដើរតួជាមួយទៀត', 1, 1, 1),
(8, '2019-10-05 02:35:14', 'ប្រវត្តិ Bill Gates ពី​អ្នក​សរសេរ​កម្មវិធី​​ក្លាយ​ជា​មហាសេដ្ឋី​​ពិភពលោក', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">បទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570260906895814.jpg', 3, 1, 3, 'ប្រវត្តិ-Bill-Gates-ពី-អ្នក-សរសេរ-កម្មវិធី-ក្លាយ-ជា-មហាសេដ្ឋី-ពិភពលោក', 1, 0, 1),
(9, '2019-10-05 02:35:41', 'ចេញ​គំរូ​រាង AirPods 3 ល្បី​ថា​មក​ជាមួយ​មុខងារ​ថ្មី ​អាច​ប្រកាស​ខែ​តុលា​នេះ', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">បទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570260938614109.jpg', 3, 1, 3, 'ចេញ-គំរូ-រាង-AirPods-3-ល្បី-ថា-មក-ជាមួយ-មុខងារ-ថ្មី-អាច-ប្រកាស-ខែ-តុលា-នេះ', 1, 0, 1),
(10, '2019-10-05 02:36:19', 'iPhone 11 Pro មាន​លក់​មួយ​ទឹក​តម្លៃ​ប៉ុណ្ណឹង​ល្មម​ទិញ​អត់?', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: left;">បទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570260976141152.jpg', 3, 1, 3, 'iPhone-11-Pro-មាន-លក់-មួយ-ទឹក-តម្លៃ-ប៉ុណ្ណឹង-ល្មម-ទិញ-អត់-', 1, 0, 1),
(11, '2019-10-05 02:37:02', '​មក​ដឹង​ការ​ពិន័យ​នៅ​ Real Madrid ​ចំពោះ​កីឡាករ​មក​ហាត់​យឺត ​និយាយ​ទូរសព្ទ...', '<p>&nbsp;ទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570261018448949.jpg', 3, 1, 2, '-មក-ដឹង-ការ-ពិន័យ-នៅ-Real-Madrid-ចំពោះ-កីឡាករ-មក-ហាត់-យឺត-និយាយ-ទូរសព្ទ-', 1, 10, 1),
(12, '2019-10-05 02:37:34', 'ទៅ​លើក​ទី១​ អេលីត​ ភក្ដី​ យក​ឈ្នះ​ម្ចាស់​ផ្ទះ​មីយ៉ាន់ម៉ា​ ម៉ាអ៊ែម​', '<p>បទ​ចម្រៀង​ថ្មី​មួយ​ដែល​ច្រៀង​រួម​គ្នា​ដោយ​ Dan + Shay ជា​មួយ​នឹង​ Justin Bieber បាន​ចេញ​ផ្សាយ​កាល​ពី​ប៉ុន្មាន​ម៉ោង​មុន​នេះ។ វា​ជា​បទ​ថ្មី​ចុង​ក្រោយ​មួយ​របស់ Justin ក្រោយ​ខក​ខាន​ចេញ​បទ​ចម្រៀង​ជា​យូរ។</p>\r\n<p style="text-align: left;">Rush TRD ស៊េរី ២០២០ បាន​រចនា​ជាមួយ​ចង្កៀង​ប្រភេទ LED មាន​ប្រព័ន្ធ​ភ្លើង​បិទ​បើក​ដោយ​ស្វ័យប្រវត្តិ រួមជាមួយ​អំពូល​ភ្លើង​បំភ្លឺ​ផ្លូវ​ពេលថ្ងៃ​ Daytime Running Light។ រថយន្ត​មួយ​នេះ​ប្រើ​យ៉ាន់​ស្ព័រ​ទំហំ ១៧ អ៊ីញ មាន​កញ្ចក់​មើល​ក្រោយ​អាច​បញ្ជា​ដោយ​ថាមពល​អេឡិចត្រូនិក ចង្កៀង​ក្រោយ​បំពាក់​អំពូល​ប្រភេទ​ LED។</p>\r\n<p style="text-align: left;"><img src="http://localhost/stage17/project/admin/img/1570260809582950.jpg" alt="" width="612" height="408" /></p>\r\n<p>&nbsp;</p>', 'img/1570261051486729.jpg', 3, 1, 2, 'ទៅ-លើក-ទី១-អេលីត-ភក្ដី-យក-ឈ្នះ-ម្ចាស់-ផ្ទះ-មីយ៉ាន់ម៉ា-ម៉ាអ៊ែម-', 1, 25, 1),
(13, '2019-10-19 01:39:04', 'sdafsadfs', '<p>wefsdfsdasdafsdf</p>', 'img/1571467140373571.jpg', 13, 1, 1, 'sdafsadfs', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE IF NOT EXISTS `tbl_permission` (
  `uid` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `mname` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`uid`, `menu_id`, `mname`) VALUES
(2, 0, 'Menu'),
(3, 4, 'Permission'),
(2, 2, 'Ads'),
(2, 1, 'News'),
(3, 3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `pass`, `type`, `ip`, `verify_code`, `status`) VALUES
(1, 'la3la3168@gmail.com', '$2y$10$Vvs2VMLxCNGCPt4oE0gRmuZzoktkTbzMAKhO3EA3BsILzUHgSPC.u', 'admin', '::1', '', 1),
(2, 'test1@gmail.com', '$2y$10$nmXJUK7edzOSEvpThc.00.7LC/08Tyu03B7qLl2H76qiX4lZbG.7W', 'client', '::1', '000', 1),
(3, 'pkit@gmail.com', '$2y$10$B.uI61krMF6LKFShGVi.qe1LRQXef8g.KBURPeWoDujzp8xbj31wS', 'client', '::1', '000', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
