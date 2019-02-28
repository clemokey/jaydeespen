-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2018 at 10:12 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judithblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `section` tinyint(4) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `subtitle` int(11) DEFAULT NULL,
  `word` text NOT NULL,
  `picture_name` varchar(100) DEFAULT NULL,
  `picture_size` varchar(100) DEFAULT NULL,
  `document_name` varchar(50) DEFAULT NULL,
  `document_size` varchar(50) DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `topic`, `category_id`, `subtitle`, `word`, `picture_name`, `picture_size`, `document_name`, `document_size`, `media`, `date`, `updated_date`) VALUES
(1, 'This Write-up Broke Me', 6, 2, 'My heart is broken and I will spill my grief here.\r\nOur society loves to play hush hush on everything. We pamper violence, abuse and the outright violation of the rights of vulnerable persons.\r\nAnd you know what else we do? We blame the devil for the sexual violence and abuse perpetrated against defenseless children. We pray and curse the predators who molest innocent children but forget to ask for justice.\r\nWe create an environment where children live in fear because they have no one to turn to knowing they will be hushed/silenced.\r\n\r\nWe stand in our religious gatherings and honour perpetrators of these crimes. We even enthrone them to high positions in the society, and accord them the respect they do not deserve.\r\nWe make the classrooms and schools a living hell for young girls and boys who are abused by caretakers and teachers. We play along and we act like we do not see the fear in the eyes of these children.\r\n\r\nYou know what else we do? We are quick to blame victims and survivors for putting themselves in the position to be hurt. We blame 7 year old girls for being girls. We judge 10 year-old girls for developing too fast and \'seducing\' the 56 year old man who sought them out and violated them.\r\n\r\nWe fail our children and in turn the future by keeping silent and pretending all is well. We do not fight for them. We do not cry for justice on their behalf. We do not defend them. We hush them. We hush them. We hush them and we hush them.\r\n\r\nOne day I will say more but as you go about your daily activities today, bear in mind that for our every indifference and inaction, we lose a child and we bury a future.\r\n\r\nP.S: this post is not originally mine, but because of the weight of its importance, I decided to share because it can\'t and should not be ignored.\r\nI hope you all have an amazing dayðŸ˜ƒ.', 'close-up-child-abuse-form-30089494.jpg', '55114', '', '0', '', '2018-12-22', NULL),
(2, 'MEN DON\'T CRY', 1, 4, 'Hey!Hold on a bit! Who says men don\'t or shouldn\'t cry? Men, just like women, are human, flesh and blood. Man was first created by God,no doubt, to be the head of the family, to support, provide, love amongst other duties which I am sure does not include pretending to be a rock and refusing to show emotions. Even the Bible is full of crying men; Jeremiah, David, Jacob, Samuel etc. Oh and even Jesus wept, remember?\r\nCrying is one of the few human universals. It is a manifestation of strong emotions, not just sadness or grief but also extreme happiness. Crying is not a sign of weakness and why should it be morally wrong? I mean, who gets hurt if a man cries? Crying for every little thing when you are an adult is probably a sign of mental distress, but in response to strong emotions it is normal. The gender one belongs to is irrelevant; it is perfectly human to cry.\r\nWe cause so much harm trying to bring up men who live in denial of their emotions and feelings. The effect of this is that they end up seeking other outlets to free such emotions; outlets more harmful than \"mere shedding tears\". I\'m talking about physical violence, suicidal tendencies, excessive drinking and smoking, sexual frustrations, to mention but a few.\r\n\r\nPersonally, I believe it takes a lot of courage for a person, more so male to find me worthy to see their tears. Yes I said that! I spoke to a close friend about this and he said \"I see no reason why men shouldn\'t cry. I am a guy but that doesn\'t make me invincible. When I am hurt, I may not necessarily break down in public, but when I get home, I lock myself up in my room and cry shamelessly. Then I wash my face, come out and let life continue, taking note not to cry for the same reason again.\r\nLet me share with you this story I read somewhere. A youth corp member was with about five of his friends when news came from home to inform him of his brother\'s death. When he ended the call, he struggled not to break down. The struggle between him and his emotions was so serious that one of his friends (female) had to touch him and say \"You can cry and break down, don\'t fight it.\" They all sat quietly while he wailed, groaned and cried for hours, until he had let it all out.\r\nMonths later,he met that friend again and one of the things he said to her amidst appreciating her, was \"That was the first time I ever cried.\" and that experience changed her life. Isn\'t that shocking to you?\r\nWe often see situations where parents say to their male children \"Stop crying, see how you are disgracing yourself like a girl.\" Seriously? Girls are the ones allowed to disgrace themselves with tears? You may not know this but I tell you what: we are only destroying our children if we keep telling them things like that.We cannot think it is normal to raise children who live in constant denial of their emotions or are afraid to show them. It does not make them weak. Crying is not a sign of weakness; admitting hurt and pain is not weakness.\r\nAccording to Mauritius, crying is not at all a show of weakness, but a moment where someone embraces their emotions, which if anything, is a sign of strength and should be celebrated. Even Abraham Lincoln in his letter to his son\'s teacher, asked the latter to teach his son that \"...there is no shame in tears\".\r\n\r\nIt is dangerous to raise men to be aggressive on one hand while also telling them to suppress their emotions. We are causing plenty harm to the society because we are grooming people who will never be honest with their emotions. The adverse effects of this action cannot be overemphasized. One day, I warn, people will explode from all that bottling inside and you don\'t think that\'s scary? Well,I\'m incredibly sorry for you if you still live with the notion that it is socially unacceptable for you to express your emotions.', 'textgram.png', '478781', '', '0', '', '2018-12-22', NULL),
(3, 'Her First Love ', 5, 1, 'Judith was crazy, annoying, stubborn even weird but when it came to her love life, she was the most caring and loving partner anyone could ask for. They weren\'t two or three in her life; they were uncountable, but she loved them all, although the possibility of loving some more than the others was always there. Everywhere she went, she had one of them with her; she tried not to be with more than one at a time for obvious reasons.\r\n\r\nThey all had their diverse duties; some had the duty of making her laugh when she had several reasons to cry. Some had the duty of taking her through painful nights. Some taught her refreshing things about life she never knew. Yet, some others were simply there because she loved them. She took good care of them and they in turn, loved her immeasurably.\r\n\r\nShe had a certain degree of faithfulness and respect for each of them, thus they were not very threatened by each other\'s presence. If she was with any of them, she took him everywhere she went until the temporary expiration of their time together.\r\n\r\nBecause of them, she sacrificed a lot yet she didn\'t mind. She was ridiculed by friends and foes alike. Even at school,her teachers punished her at every chance they got. Once, she was seriously embarrassed on account of two of them in front of the entire class but she didn\'t mind. As long as she had them, she was fine.\r\n\r\nThen one day, Ann her classmate walked up to her and said \"I dunno how you\'ve managed to keep your head high despite all this, but I certainly admire you. I\'ve dabbled in and out of love so many times I promised myself I\'m never going to do this again. But sincerely after watching you for sometime, I think I want to give it one more try. Can I take one of your lovers for a while?\"\r\n\r\nThe idea was crazy to Judith; she had never \"given out\" any of her lovers to anyone before, no matter how numerous people thought they were. But Ann was her friend and she just couldn\'t say \"No\". So she replied \"Alright Ann, you can take Sydney my first love. He sure will give you lots of reasons to love again but I must get him back after a week cos I always need him in my arms\". So Sydney went with Ann wordlessly to help her find another chance at love.\r\n\r\nA week later,Judith dropped by Ann\'s hostel to get back her love. After exchanging pleasantries, there was an uncomfortable silence for a moment, then Ann said \"I\'m sorry Jay, I lost him\" \"Lost him? How?!!!\",Judith thundered.\"\r\nWe went to bed two nights ago\", Ann replied, \"but by the time I woke up the next morning, he was gone. I asked my roommates but they all denied knowing his whereabouts\". \"Gone?! No way!\",Judith sobbed aloud, \"he didn\'t even give me a chance to say goodbye. How am I ever going to find him or anyone like him again?\"\r\n\r\nShe left in tears and began to search for him. Up to this day, she still does although she knows she may never find him again. And that was how she lost her first love,the very first novel that ever defined the beauty of words to her imagination - \"Tell Me Your Dreams\" by Sydney Sheldon.\r\n\r\nP.S: Attached to this is a picture of that terrific novel, you may want to check it out for yourselfðŸ˜‰. I hope you have as much a wonderful read as I did, or in this case even better.', 'unnamed.jpg', '56182', '', '0', '', '2018-12-22', NULL),
(4, 'DO IT NOW!!!', 1, 1, 'Some recent happenings have left me thinking.\r\nIf you want to identify a very brilliant,gorgeous/handsome,well loved,wonderful etc. person,read burial tributes.\r\nI\'m gonna share an experience I had with you. \r\n\r\nSometime last year,I saw a Facebook post saying that one of my childhood best friends was dead.You can imagine my shock when other people began to write similar RIP stuffs (about how much they loved her but God loves her most) and tagged her. Although we were no longer as close as before, I still cared about her but hadn\'t spoken to her in a while. I tried her line; it wasn\'t going through. I even chatted her up but no response. I was devastated. The only thing that was going through my mind was how she would never really know how much people (including myself and those she might not have known about) cared about her.\r\n\r\nLater that evening, I was able to get through to her and found out that she wasn\'t dead, but was VERY ILL and had narrowly escaped death. You can as well imagine my relief that she was still alive.\r\n\r\nWhat message am I trying to pass across? Sometimes, we really care about people, yes we do. But we refuse to tell them, in the fear that they might underplay or even abuse our love for them. And in the end, we lose the once-in-a-lifetime opportunity we have to tell and show them how we truly feel.\r\n\r\nDon\'t be like me! Don\'t wait until you\'re to write an RIP note on that person\' timeline. Do It Now!!! Inbox them! Call them! Let them know you care;It may be all they need to hear right now.\r\n#JaydeeInspires PeaceâœŒ', 'FB_IMG_14848434418740222.jpg', '30826', '', '0', '', '2018-12-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'Lifestyle/Non-fiction'),
(2, 'Poems'),
(3, 'The Girl-Child of Today (TGOT)'),
(4, 'Dear Reader Series'),
(5, 'Literature'),
(6, 'Articles');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'lawalgoodness14@gmail.com', 'hope123'),
(2, 'judithgratitude2016@gmail.com', 'LovedAndSaved4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueemail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
