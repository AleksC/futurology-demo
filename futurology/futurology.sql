-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: futurology
-- ------------------------------------------------------
-- Server version	5.7.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `news_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `news_id_idx` (`news_id`),
  KEY `username_idx` (`username`),
  CONSTRAINT `news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (20,'rocket',5,'Dope!','2016-07-28 15:17:19'),(21,'alek',22,'This is really interesting. ','2016-08-15 01:59:37'),(22,'misa',22,'I never even thought of this!','2016-08-15 02:00:08');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(555) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(45) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (5,'A Plane Just Flew Around The World Without A Single Drop Of Fuel','The flight of Solar Impulse 2 is a huge achievement for clean energy.','More than a year after it first took to the skies, a solar-powered plane has completed an epic around-the-world journey without burning a single drop of fuel.\r\n\r\nThe revolutionary, single-seat Solar Impulse 2 touched down Tuesday morning in Abu Dhabi, at the same airport where it embarked back in March 2015. Over the last 16 months, Swiss aviator Bertrand Piccard and fellow pilot Andre Borschberg took turns flying the aircraft nearly 27,000 miles, tallying eight world records along the way.\r\n\r\nSpeaking to those gathered on the runway at Al Bateen Executive Airport in Abu Dhabi, Piccard said the journey is more than just a triumph for aviation ― it’s a major achievement in energy.\r\n\r\n“We have traveled 40,000 kilometers without fuel. Now it’s your turn to take it further,” Piccard said. “We have enough solutions, enough technologies. We should never accept the world to be polluted only because people are scared to think in another way. The future is clean, the future is you, the future is now.”\r\n\r\nThe aircraft is made mostly of carbon fiber and is powered by 17,248 solar cells attached to its wings, which recharge four lithium polymer batteries. Despite its 236-foot wingspan, it weighs roughly the same as a Ford Explorer ― nearly 200 times lighter than a Boeing 747. It reaches a top speed of 90 mph.\r\n\r\nSolar Impulse 2’s worldwide tour included stops in India, China, Japan, Italy, Spain and several U.S. locations, including Hawaii, San Francisco, Phoenix, Tulsa, Oklahoma, and New York. The last of the trip’s 17 legs took the aircraft from Cairo to Abu Dhabi, a total of 1,674 miles in a little over 48 hours.   \r\n\r\nIn April, Solar Impulse 2 made international headlines after crossing the Pacific, which included a 5,500-mile nonstop flight from Japan to Hawaii ― the longest of the trip. En route from Japan, the plane sustained battery damage, which ultimately kept the aircraft grounded in Hawaii for nine months.\r\n\r\nIn June, it completed a three-day Atlantic crossing from New York to Seville, Spain.\r\n\r\n“By flying around the world thanks to renewable energy and clean technologies, we have demonstrated that we can now make our world more energy efficient,” Borschberg said in a statement this week, according to The Associated Press.\r\n','2016-07-27 14:53:05','technology','5796b6941200002a00a535fc.jpeg'),(8,'Growing Organs on Apples','The future of regenerative medicine may be plants.','In the high-ceilinged basement lab, the ear lies flat, encapsulated in a dish on a sheet-metal cabinet. It’s actually a piece of apple carved to look like an ear, yet it’s not really an apple either; the cellulose has been washed of its apple cells and populated instead with human ones. They are HeLa cells, the infamously ubiquitous cultured offspring of a long-ago cervical cancer. I am looking at an ear made of cervix, held together by apple.\r\n\r\n“Biohacking is the new gardening,” says Andrew Pelling, who leads the Pelling Laboratory for Biophysical Manipulation at the University of Ottawa. Pelling eschews the current vogue for genetic and chemical biological manipulation, investigating instead the ways in which cells behave when their physical surroundings change.\r\n\r\nThe apple ear was created as an artistic statement, referring to a famous case of a human ear that was grafted onto a mouse’s back, and its choice of HeLa cells was intentionally provocative. But the fusion of plant and animal it represents holds promise for regenerative medicine, in which defective body parts may be replaced by engineered alternatives.\r\n\r\nBiomaterials engineers, who create stand-ins for our own body tissues, historically focus on animal species, like pigs, with organs similar to ours. Until now, the plant kingdom has been largely neglected, but it offers a vast variety of architectures, many of which can serve the needs of human physiology. It also offers an escape route from expensive, proprietary biomaterials: an open-source approach.\r\n\r\nA central challenge in organ creation is the development of materials that can host the new cells within the body, holding the organ’s shape and organization. In a synthetic approach, a molded polymer scaffold can hold the shape of an organ, then biodegrade as new cells gradually replace it. Alternatively, real donor organs can be washed of all the donors’ cells until they are white “ghost organs”—collagen structures that are then colonized with a patient’s own cells. In either case, the man-made and organic biomaterials are commercially produced or harvested and processed, at great cost.\r\n\r\nBillions of dollars change hands in the biomaterials sector each year, replacing skin, cartilage, bone, and whole organs. The industry attracts talented researchers ready to profit from their intellectual property, but it also prices out most of the world. For example, few people can spend $800 per cubic centimeter of human decellularized dermal allograft tissue to reconstruct a badly torn rotator cuff in the shoulder, but at less than 1 cent, the same amount of apple is well within reach.','2016-07-28 15:21:52','medicine','lead_960.jpg'),(22,'CO2 can be stored underground for 10 times the length needed to avoid climatic impact: study','Study of natural-occurring 100,000 year-old CO2 reservoirs shows no significant corroding of cap rock, suggesting the greenhouse gas hasnt leaked back out - one of the main concerns with greenhouse gas reduction proposal of carbon capture and storage.','New research shows that natural accumulations of carbon dioxide (CO2) that have been trapped underground for around 100,000 years have not significantly corroded the rocks above, suggesting that storing CO2 in reservoirs deep underground is much safer and more predictable over long periods of time than previously thought.\r\nThese findings, published today in the journal Nature Communications, demonstrate the viability of a process called carbon capture and storage (CCS) as a solution to reducing carbon emissions from coal and gas-fired power stations, say researchers.\r\nCCS involves capturing the carbon dioxide produced at power stations, compressing it, and pumping it into reservoirs in the rock more than a kilometre underground.\r\nThe CO2 must remain buried for at least 10,000 years to avoid the impacts on climate. One concern is that the dilute acid, formed when the stored CO2 dissolves in water present in the reservoir rocks, might corrode the rocks above and let the CO2 escape upwards.\r\nBy studying a natural reservoir in Utah, USA, where CO2 released from deeper formations has been trapped for around 100,000 years, a Cambridge-led research team has now shown that CO2 can be securely stored underground for far longer than the 10,000 years needed to avoid climatic impacts.\r\nTheir new study shows that the critical component in geological carbon storage, the relatively impermeable layer of \"cap rock\" that retains the CO2, can resist corrosion from CO2-saturated water for at least 100,000 years.\r\n\"Carbon capture and storage is seen as essential technology if the UK is to meet its climate change targets,\" says lead author Professor Mike Bickle, Director of the Cambridge Centre for Carbon Capture and Storage at the University of Cambridge.\r\n\"A major obstacle to the implementation of CCS is the uncertainty over the long-term fate of the CO2 which impacts regulation, insurance, and who assumes the responsibility for maintaining CO2 storage sites. Our study demonstrates that geological carbon storage can be safe and predictable over many hundreds of thousands of years.\"\r\nThe key component in the safety of geological storage of CO2 is an impermeable cap rock over the porous reservoir in which the CO2 is stored. Although the CO2 will be injected as a dense fluid, it is still less dense than the brines originally filling the pores in the reservoir sandstones, and will rise until trapped by the relatively impermeable cap rocks.\r\n\"Some earlier studies, using computer simulations and laboratory experiments, have suggested that these cap rocks might be progressively corroded by the CO2-charged brines, formed as CO2 dissolves, creating weaker and more permeable layers of rock several metres thick and jeopardising the secure retention of the CO2,\" explains Bickle.\r\n\"However, these studies were either carried out in the laboratory over short timescales or based on theoretical models. Predicting the behaviour of CO2 stored underground is best achieved by studying natural CO2 accumulations that have been retained for periods comparable to those needed for effective storage.\"\r\nTo better understand these effects, this study, funded by the UK Natural Environment Research Council and the UK Department of Energy and Climate Change, examined a natural reservoir where large natural pockets of CO2 have been trapped in sedimentary rocks for hundreds of thousands of years. Sponsored by Shell, the team drilled deep down below the surface into one of these natural CO2 reservoirs to recover samples of the rock layers and the fluids confined in the rock pores.\r\nThe team studied the corrosion of the minerals comprising the rock by the acidic carbonated water, and how this has affected the ability of the cap rock to act as an effective trap over geological periods of time. Their analysis studied the mineralogy and geochemistry of cap rock and included bombarding samples of the rock with neutrons at a facility in Germany to better understand any changes that may have occurred in the pore structure and permeability of the cap rock.\r\nThey found that the CO2 had very little impact on corrosion of the minerals in the cap rock, with corrosion limited to a layer only 7cm thick. This is considerably less than the amount of corrosion predicted in some earlier studies, which suggested that this layer might be many metres thick.\r\nThe researchers also used computer simulations, calibrated with data collected from the rock samples, to show that this layer took at least 100,000 years to form, an age consistent with how long the site is known to have contained CO2.\r\nThe research demonstrates that the natural resistance of the cap rock minerals to the acidic carbonated waters makes burying CO2 underground a far more predictable and secure process than previously estimated.\r\n\"With careful evaluation, burying carbon dioxide underground will prove very much safer than emitting CO2 directly to the atmosphere,\" says Bickle.','2016-07-28 16:18:33','science','co2canbestor.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'user',
  `f_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'alek','123','admin','alek','johnson','alek@futurology.com'),(3,'misa','123','user','misa','misanson','misa@futurology.com.'),(5,'xenia','456','user','xenia','xenoblade','xena@futurology.com'),(7,'jim','miller','user','jim','miller','jim@miller.com'),(9,'jonah','spider-man','user','jonah','jameson','jjjameson@dailybugle.com'),(12,'jon','snow','user','jon','snow','jonsnow@thewall.com'),(14,'james','132','user','james','hetfield','james@metallicarules.com'),(15,'bojack','horseman','user','bojack','horseman','bojack@horseman.com'),(16,'peter','parker','user','peter','parker','peter@dailybugle.com'),(17,'dwayne','123','user','dwayne','johnson','dwayne@therock.com'),(18,'mitch','hedberg','user','mitch','hedberg','mitch@hedberg.com'),(20,'diane','nguyen','user','diane','nguyen','diane@horse.com'),(25,'stewie','griffin','user','stewie','griffin','stewie@griffin.com'),(26,'bart','simpson','user','bart','simpson','bart@simpson'),(27,'drax','drax','user','drax','the destroyer','drax@guardians.com'),(28,'iam','groot','user','iam','groot','groot@guardians.com'),(29,'rocket','rocket','user','rocket','racoon','rocket@guardians.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-15  2:13:55
