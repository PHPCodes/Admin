-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2014 at 11:45 PM
-- Server version: 5.1.69
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abhishek_musicapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE IF NOT EXISTS `access_tokens` (
  `oauth_token` varchar(40) NOT NULL,
  `client_id` char(36) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` int(11) NOT NULL,
  `scope` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oauth_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(250) NOT NULL,
  `album_name` varchar(500) NOT NULL,
  `status` int(4) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` varchar(250) NOT NULL,
  `artist` varchar(500) NOT NULL,
  `singer` varchar(500) NOT NULL,
  `tracks` int(11) NOT NULL,
  `released` varchar(500) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `label` varchar(500) NOT NULL,
  `listeners` int(11) NOT NULL,
  `tag` varchar(500) NOT NULL,
  `featured` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `category_id`, `album_name`, `status`, `description`, `logo`, `user_id`, `created`, `artist`, `singer`, `tracks`, `released`, `rating`, `label`, `listeners`, `tag`, `featured`) VALUES
(55, '126', '4 Jamz from western Africa', 1, 'One more time here we bring something fresh to be back on track. 4 new songs as a demo tape, previous to our upcoming 12". In the same vein as former stuff: catchy riffs, nyhc grooves...\r\nSuper Soldiers Tapes (Stomp records and two of the M.A.L.M. guys) are going to put this shit out on the streets.\r\nThe tape will have a very special bonus track on side B thanks to our friend Facil-E and his MPC. You want to hear it? be on the look out cause there will be just 100 copies or so and they''re gonna run out fast. Trust me these guys give all they''ve got to spread their goods.\r\n\r\nKeep an eye open and don''t forget that our 12" will drop some day this year. ', '1004.jpeg', 152, '1398790419', 'Good Fellaz', 'Good Fellaz', 8, '03 April 2011 ', '4', 'Unknow', 1, 'hardcore punk Spain', 1),
(56, '126', 'Erosion of the limit 7', 1, 'Go ahead, download our songs from this EP for free.\r\nGet a copy contacting to roberto.dorta@gmail.com or buying it first-hand from one of our own gigs. ', 'a3646055030_2.jpg', 152, '1399313374', 'Jose A. LÃ³pez', 'Jose A. LÃ³pez', 2, '21 March 2009 ', '5', 'Unknow', 0, 'hardcore punk Spain', 0),
(57, '123', 'Tech N9ne - Strangeulation', 1, 'Production: Jeffrey "Frizz" James, Michael "Seven" Summers, Scott "The Ninja" Stevens\r\nLead Single: Nobody Cares: (The Remix)', 'techn9ne-strangulation.jpg', 152, '1399393888', 'Jeffrey Frizz James', 'Jeffrey Frizz James', 40, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 1),
(59, '123', 'Avery Storm - Audiobiography EP', 1, 'In October of 2012, Booth-approved artist Avery Storm put it all On the Line. A little more than 19 months later, the NYC native has now released his Audiobiography EP.\r\nIncluded on the six-track EP, a collaboration with production team The Ceasars, are previously-featured lead single, "Canâ€™t Walk Away," and follow-up record "Head Over Heels."\r\nJoining Storm on the project, which has been championed by Funkmaster Flex and DJ Self among others, are a trio of East Coast rap veterans: Jadakiss, N.O.R.E and Styles P.\r\nAudiobiography is now available for direct purchase and full stream at The DJBooth. All tracks are HQ audio MP3s (320 kbps). ', 'averystorm-audiobiography.jpg', 152, '1399394310', 'Jeffrey Frizz James', 'Jeffrey Frizz James', 2, '21 March 2009', '5', 'Unknow', 0, 'hardcore punk Spain', 0),
(60, '124', '2 Chainz - Freebase EP', 1, 'Later this year, 2 Chainz will release B.O.A.T.S III, his third major label album in the last three years. To help tide over his die hard fans who are patiently waiting for the new full-length, the Atlanta native has dropped a new project, Freebase.\r\nThe seven-track free EP includes guest contributions from heavy hitters like A$AP Rocky, Rick Ross and Ty Dolla $ign, the return of Lil Boosie, and Chainz'' own artist, Cap 1.\r\nMeanwhile on the opposite side of the boards, there are more producers involved than tracks on the release, including Metro Boomin, Mike WiLL Made It and more. ', '2chainz-freebase.jpg', 152, '1399395007', '2 Chainz', '2 Chainz', 2, '21 March 2009', '4', 'Def Jam', 0, 'hardcore punk Spain', 0),
(61, '124', '2 Chainz ft. Lil Boosie - Wuda Cuda Shuda', 1, 'When someone says, â€œI could of, should of, would of,â€ it means that something that could have been done, should have been done and would have been doneâ€¦ well, did not get done. Regardless of the reason, the end result is usually disappointment and upset. 2 Chainz understands this frustration, which is why he is calling out all of the Wuda Cuda Shuda folk who donâ€™t make good on their promises. Production is handled by frequent collaborator Mike WiLL Made It, who keeps things simple behind the boards with a booming bass and some short synthesized keys. Assisted by Lil Boosie, who as of Thursday proclaimed he has the â€œHeart of a Lion,â€ this single will be found on Dos Chainzâ€™ forthcoming free EP, Freebase, due out on Monday, May 5.', '2chainz-woulda.jpg', 152, '1399395090', '2 Chainz', '2 Chainz', 3, '21 March 2009', '2', 'Def Jam', 0, 'hardcore punk Spain', 1),
(62, '124', 'BOOTS - WinterSpringSummerFall', 1, 'BOOTS, the singer/songwriter and producer who worked extensively behind-the-scenes on BeyoncÃ©''s self-titled album release last year, has released his debut project, WinterSpringSummerFall.\r\nAvailable for stream-only, the 16-track project includes Queen Bey-assisted lead single, "Dreams."\r\nThe Roc Nation signee, whose music is an eclectic mix of R&B, soul, progressive pop and folk, is joined on his seasonally-titled release by special guests Jeremih, Kelela, Shlohmo and Son Lux.', 'boots-winterspring.jpg', 152, '1399397497', 'BOOTS', 'BOOTS', 1, '21 March 2009', '2', 'Unknow', 0, 'hardcore punk Spain', 0),
(63, '124', 'Taylor Bennett - Mainstream Music', 1, '18-year-old emcee Taylor Bennett, a true buzzmaker in his hometown of Chicago, has released of his sophomore project, a collection of records that challenge what the term "Mainstream Music" really means.\r\nIncluded on the 14-track release, the follow-up to 2013''s The Taylor Bennett Show, are previously-featured, Booth-approved selections "Hope" and "New Chevy."\r\nJoining Taylor, younger brother of Chance The Rapper, on Mainstream Music are special guests King L, Lil Herb, Loyale SoulÑ‘, Rockie Fresh and Spenzo. Production is provided by Brall Beats, Cocaine Audio, Illiad, Monte Booker, Muzzy, Saint The Goodboy, and Satchel Stokes.\r\nThe project''s release will be followed by a headlining show at Chicago''s historic Lincoln Hall, co-sponsored by Closed Sessions, 2DopeBoyz.com and The DJBooth, on May 24. ', 'taylorbennett-mainstreammusic.jpg', 152, '1399397553', 'BOOTS', 'BOOTS', 2, '03 April 2011', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(64, '125', 'Gary Clark Jr. - Blak And Blu: The Mixtape', 1, 'In October of 2012, versatile recording artist Gary Clark Jr. released his major label debut, Blak and Blu. It is over the past 18 months, however, that the gifted Austin, TX native has really become a more household name.\r\nFresh of January''s Grammy award win for "Best Traditional R&B Performance" (for the record "Please Come Home"), the Warner Bros. signee has joined forced with D-Nice to release a free mixtape version of his aforementioned inaugural body of work.\r\nFeatured on the nine-track tape is the previously-released, Booth-approved "Blak and Blu (Remix)," which features assistance from Big K.R.I.T.. Guest spots on the project belong to respected veterans Bilal and Talib Kweli, while Robert Glasper and K.R.I.T. each turn in remixed versions of original tracks from the album. ', 'garyclarkjr-blakblu.jpg', 152, '1399398136', 'Gary Clark Jr.', 'Gary Clark Jr.', 2, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(65, '125', 'Paris Jones - April EP', 1, 'Los Angeles emcee and producer Paris Jones has once again come together with The DJBooth to bring listeners his latest street release, the April EP.\r\nThe fourth in a series of 12 monthly EPs that Paris plans to release over the course of the year (Its predecessors, January, February and March are also available for download in the Booth.), the project packs a total of six original instrumentals from the West Coast buzzmaker that are straight from the heart and meant for hardcore Hip-Hop heads.\r\nAccording to Jones, "It''s that Uptown South Bronx Boom Bap, but with a Detroit swing."\r\nFans can also check out Paris Jones''s previous albums: Paris Jones - March EP | Paris Jones - February EP | Paris Jones - January EP\r\n', 'parisjones-april.jpg', 152, '1399398234', 'Gary Clark Jr.', 'Gary Clark Jr.', 3, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(66, '127', 'DJ Blaze - Blazing Cuts (April 2014)', 1, 'We in The DJBooth are proud to present the latest installment in Blazing Cuts, a monthly series of free, exclusive mixtapes curated by our very own DJ Blaze.\r\nFor your listening pleasure, Blaze has sifted through the hundreds of records featured in April to find the cream of the crop. The result is a 15-track compilation showcasing the best free new music to hit our front page over the course of the month. This edition of Blazing Cuts features fresh material from Young Thug (The Blanguage), Dizzy Wright (Everywhere I Go), GoldLink (Wassup) and many more of your favorite artists.\r\nFans can also check out DJ Blaze''s previous albums: DJ Blaze - Blazing Cuts (March 2014) | DJ Blaze - Blazing Cuts (February 2014) | DJ Blaze - Blazing Cuts (January 2014)\r\n', 'blazingcuts-april14.jpg', 152, '1399398600', 'DJ Blaze', 'DJ Blaze', 7, '03 April 2011', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(67, '127', 'Pete Sayke x ThatKidMyself - Forever', 1, 'We in The DJBooth are proud to present the latest installment in Blazing Cuts, a monthly series of free, exclusive mixtapes curated by our very own DJ Blaze.\r\nFor your listening pleasure, Blaze has sifted through the hundreds of records featured in April to find the cream of the crop. The result is a 15-track compilation showcasing the best free new music to hit our front page over the course of the month. This edition of Blazing Cuts features fresh material from Young Thug (The Blanguage), Dizzy Wright (Everywhere I Go), GoldLink (Wassup) and many more of your favorite artists.\r\nFans can also check out DJ Blaze''s previous albums: DJ Blaze - Blazing Cuts (March 2014) | DJ Blaze - Blazing Cuts (February 2014) | DJ Blaze - Blazing Cuts (January 2014)\r\n', 'petesayke-forever.jpg', 152, '1399399004', 'DJ Blaze', 'DJ Blaze', 2, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(68, '128', 'Styles P - Phantom And The Ghost', 1, 'Styles P, one third of the legendary rap group The Lox, has released his new solo album, Phantom And The Ghost.\r\nThe 12-track LP, which includes the Jadakiss and Rocko-assisted lead single, "Sour," is the first partnership between the Yonkers native''s imprint, Phantom Entertainment/D-Block Records, EMPIRE and the New Music Cartel.\r\nAdditional guests on the project, SP''s first release since 2013''s Float, include Raheem DeVaughn, fellow D-Block emcee Sheek Louch and Vado, while boardwork is turned in by Black Saun, Harry Fraud, Joe Milly, Noodles, Vinny Idol and many more.\r\nPhantom And The Ghost is now available for digital purchase and full streaming right here at The DJBooth. All tracks purchased are high quality audio (320 kbps MP3s).\r\nFans can also check out Styles P.''s previous albums: Styles P - Float | Styles P - The Worldâ€™s Most Hardest MC Project | Styles P - Super Gangsta, Extraordinary Gentleman\r\n', 'stylesp-phantom2.jpg', 152, '1399399529', 'Styles P', 'Styles P', 1, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(69, '128', 'Grynch - Street Lights', 1, 'Seattle native Grynch has released his new album, Street Lights, and The DJBooth has a full stream of the project.\r\nIncluded on the indie emcee''s fourth full-length LP are previously-release, Booth-approved selections "Carry On," "My City''s Filthy" and "Mister Rogers (Remix)."\r\nJoining the Freestyle Series alum on the 12-track album are Bambu, Fearce Vill, Kokane, Malice & Mario Sweet, Slug and Wizdom, while production is turned in by BeanOne, Elan Wright, Jake One, MTK, Nima Skeemz, Trox and more!\r\nFans can also check out Grynch''s previous albums: Grynch - Timeless EP\r\n', 'grynch-streetlights.jpg', 152, '1399399586', 'Grynch', 'Grynch', 12, '03 April 2011', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(70, '129', 'Bas - Last Winter', 1, 'When he''s not turning in his Two Weeks Notice, Paris-born and Queens-raised emcee Bas is busy releasing his major label release of his debut, Last Winter.\r\nThe first artist signed to J. Cole''s Dreamville Records, who signed an exclusive label with Interscope Records earlier this year, Bas aims to keep his career fuse "Lit" at all times.\r\nAccording to the artist, Last Winter is "a conceptual project about hoping to break away from tough times." An audible example can be found in the form of pre-release buzz record, "Charles de Gaulle To JFK," a record that highlights the stark difference between figuratively sitting in coach and enjoying the amenities of first class.\r\nGuests on the album are limited to label boss Cole, Irvin Washington, KQuick and Mack Wilds, while production credits belong to Cedric Brown, GP808, Hottrak, Jay Kurzweil, Ogee Handz and more. Ron Gilmore served as the Executive Producer.\r\nFans can also check out Bas''s previous albums: Bas - Two Weeks Notice | Bas - Quarter Water Raised Me Vol. II\r\n', 'bas-lastwinterep.jpg', 152, '1399400036', 'Lit', 'Lit', 2, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(71, '129', 'Rapper Big Pooh x Roc C - Trouble in the Neighborhood', 1, 'For almost a decade, emcees Rapper Big Pooh and Roc C have put in serious work, consistently releasing dope music and collaborating with the most respected emcees and producers in the rap game. Naturally, it felt right for the two veterans to join forces for a bicoastal collaborative album. And thus, the pair have released Trouble In The Neighborhood.\r\nBlending their styles to create a cohesive 11-track project wasn''t simple, but it''s something Pooh and Roc agreed would sound the most authentic. "We call it controlled chaos," explains Big Pooh. A sample of their creative chemistry is evident in "The Crew," the album''s Booth-featured lead single.\r\nThe project has a heavily West Coast-influenced sound, which is due in large part to production contributions from Evidence, Focus..., S1 and others. And with appearances from Alchemist, Chaundon, Joe Scudda, MED, T3 (of Slum Village) and more, lyric-loving fans won''t be disappointed. â€œItâ€™s me and Roc coming together and causing ruckus on records,â€ explains Big Pooh.\r\nTrouble In The Neighborhood is available for digital purchase, via Wandering Worx/Greenstreets, and for full streaming right here at The DJBooth.', 'bigpoohrocc-trouble.jpg', 152, '1399400094', 'Rapper', 'Rapper', 1, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(72, '130', 'Blitz the Ambassador - Afropolitan Dreams', 1, 'Blitz the Ambassador, the globetrotting emcee who became a Booth fave on the strength of 2009 debut full-length Stereotype, has taken a break from his world travels to unleash a brand new LP, Afropolitan Dreams.\r\nThe Ghanaian-born spitter''s third studio album in total, the project directly follows 2013 EP The Warm Up. It comes preceded by reader-approved video single "Make You No Forget," featuring guest vocals from Seun Kuti, son of Afrobeat pioneer Fela Kuti. Additional guest features on the LP, which is entirely self-produced, include Amma Whatt, Marcelo, Nneka and Sarkodie.\r\nAfropolitan Dreams is available for digital purchase, via Jakarta Records, and for full streaming right here at The DJBooth. ', 'blitz-afropolitandreams.jpg', 152, '1399400514', 'Blitz the Ambassador', 'Blitz the Ambassador', 1, '21 March 2009', '3', 'Unknow', 0, 'hardcore punk Spain', 0),
(73, '130', 'Connor Evans - So Cal Soul', 1, 'A buzzmaking rapper and producer hailing from Coachella Valley, California, Connor Evans is bringing listeners everywhere a little bit of that So Cal Soul, in the form of a new digital full-length.\r\nThis street album, a collection of 14 original tracks by the unsigned wunderkind, comes heralded by singles "Kanye Glasses" "Keys," "Winterlude" and "Familia."\r\nAll of the aforementioned records won tremendous acclaim on our pages, the last-named of which was featured along with its official visuals. No guests appear on the set, which features boardwork by BHB as well as production by Evans himself.\r\nFans can also check out Connor Evans''s previous albums: Connor Evans - The Road to Coachella | Connor Evans - #GreenLightLife\r\n', '', 152, '1399400571', 'Connor Evans', 'Connor Evans', 2, '03 April 2011', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(74, '131', 'Maryann - Futuristic Always', 1, 'According to Sacramento native Maryann, "90s R&B is back with a twist." What, exactly, does this mean? Well, one listen to her brand new album, Futuristic Always, should answer that question.\r\nFeatured on the 15-track album, which pushes the boundaries of urban/pop music, are previously-released, Booth-approved selections "#CookingForBae" and "You and Me."\r\nJoining the N-Crowd signee are special guests Devin The Dude and Guilty Simpson, along with label mates Chuuwee and Takticz. Fellow West Coaster N8 the Gr8 handles production on the entire album.\r\nStarting on Monday, April 28, Futuristic Always will be available for digital purchase and stream via The DJBooth. ', 'maryann-futuristicalways.jpg', 152, '1399400900', 'Maryann', 'Maryann', 3, '03 April 2011', '3', 'Def Jam', 0, 'hardcore punk Spain', 0),
(75, '131', 'T-Jay Beats - Fruits of Labor', 1, 'Two years ago, when he was just 16 years old, T-Jay Beats began his career as a producer. Now, two birthdays and a signing to independent label TruDREAM Entertainment later, the producer born Tom Jackowski has released his first beat tape, the appropriately titled Fruits of Labor.\r\nAccording to the Chicago native, whose boardwork was heard accompanying Mick Jenkins Booth-exclusive freestyle "Steam," the title and concept behind Fruits Of Labor represents the hard work that must be invested in order to be successful.\r\nEach of the project''s nine tracks represents a different period of his personal journey to success', 'tjaybeats-fruitslabor.jpg', 152, '1399400963', 'T-Jay Beats', 'T-Jay Beats', 5, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(76, '132', 'Verbal Kent x Khrysis - Sound Of The Weapon (Instrumentals)', 1, 'In early 2014, Chicago emcee Verbal Kent teamed up with North Carolina producer Khrysis and Mello Music Group to release Sound of the Weapon.\r\nThe production on the 14-track full-length is raw and classic, which perfectly matches the authentic and aggressive characteristics of the emcee who laid rhymes over the top. In celebration of this musical marriage, the parties involved have come together with The DJBooth for a special offering.\r\nKnown for his soul samples, speaker slapping drums and 9th Wonder lineage, Khrysis has made the album instrumentals available for free download to the first 1000 fans. And as an added bonus, we''ve included a bonus beat from the Jamla Records head honco. ', 'verbalkent-soundweapon.jpg', 152, '1399401517', 'Verbal Kent x Khrysis', 'Verbal Kent x Khrysis', 1, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 0),
(77, '132', 'Mike Boyd - ...Note the Sarcasm', 1, 'In late March, Enfield, Nova Scotia native Mike Boyd released an 11-track LP, entitled ...Note the Sarcasm, which caught our collective ear here at The DJBooth.\r\nAfter listening to standout tracks like promo single "Mr. Mike" and the Booth-approved dual single, "Small World / Fly Like A Butterfly," it was clear that we needed to further introduce our audience to Boyd''s unique on-the-mic approach and charismatic flow.\r\nIn an effort to "take it back to the days of real hip-hop, with a touch of comedy and sarcasm," the Halflife Records signee and his label boss Classified (who produced the entire project) have created a complete body of work that is short on effects and heavy on ingenuity.\r\nFeaturing guest appearances from D-Sisive, Madchild, Naledge, Shad and more, ...Note the Sarcasm is currently available in stream form below, in addition to being available for purchase via iTunes. ', 'mikeboyd-notethesarcasm.jpg', 152, '1399401575', 'Mike Boyd', 'Mike Boyd', 2, '21 March 2009', '4', 'Unknow', 0, 'hardcore punk Spain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_codes`
--

CREATE TABLE IF NOT EXISTS `auth_codes` (
  `code` varchar(40) NOT NULL,
  `client_id` char(36) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `redirect_uri` varchar(200) NOT NULL,
  `expires` int(11) NOT NULL,
  `scope` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `status` text NOT NULL,
  `main` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `status`, `main`, `image`) VALUES
(123, NULL, NULL, NULL, 'TOP CHART', '1', '', 'a1.jpeg'),
(124, NULL, NULL, NULL, 'NEW RELEASES', '1', '', 'a2.jpeg'),
(125, NULL, NULL, NULL, 'HIP HOP', '1', '', '103.jpeg'),
(126, NULL, NULL, NULL, 'AFRICAN JAMZ', '1', '', 'a3.jpeg'),
(127, NULL, NULL, NULL, 'AFROBEAT', '1', '', 'a4.jpeg'),
(128, NULL, NULL, NULL, 'CLUB JAMZ', '1', '', 'a5.jpeg'),
(129, NULL, NULL, NULL, 'RB', '1', '', 'a6.jpeg'),
(130, NULL, NULL, NULL, 'RAGGAE', '1', '', 'a7.jpeg'),
(131, NULL, NULL, NULL, 'JAZZ', '1', '', 'a8.jpeg'),
(132, NULL, NULL, NULL, 'ENTERTAINMENT NEWS', '1', '', 'a9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE IF NOT EXISTS `favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE IF NOT EXISTS `sitesettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `web_url` varchar(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `site_desc` varchar(500) NOT NULL,
  `facebook_url` varchar(150) NOT NULL,
  `twitter_url` varchar(150) NOT NULL,
  `googleplus` varchar(150) NOT NULL,
  `site_email` varchar(100) NOT NULL,
  `site_address` varchar(500) NOT NULL,
  `analytic_code` varchar(500) NOT NULL,
  `server` varchar(200) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `server_auth` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `title`, `web_url`, `keywords`, `site_desc`, `facebook_url`, `twitter_url`, `googleplus`, `site_email`, `site_address`, `analytic_code`, `server`, `port`, `username`, `password`, `server_auth`) VALUES
(2, 'MusicApp', 'http://10.10.10.88/abhishek/musicapp/', 'MusicApp', 'MusicApp', 'https://facebook.com/MusicApp', 'https://twitter.com/MusicApp', 'https://googleplus.com/MusicApp', 'abc@gmail.com', 'MusicApp', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `song_name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `artist` varchar(500) NOT NULL,
  `rating` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `song` varchar(500) NOT NULL,
  `singer` varchar(500) NOT NULL,
  `listeners` int(11) NOT NULL,
  `highdefinition` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `user_id`, `album_id`, `type`, `song_name`, `description`, `image`, `artist`, `rating`, `status`, `created`, `song`, `singer`, `listeners`, `highdefinition`) VALUES
(8, 152, 55, 'Audio', ' Back to reality', 'You roam by a dead end road, alone!\r\nSink or swim. This is the time ya life need no explanations.\r\nDon''t know how you ended up into that hard situation.\r\nYa soul mother still prays wholeheartedly\r\nfor ya mind to come to reality.\r\n\r\nNow ya moral''s fallen into decay,\r\nya problem runs thru ya veins.\r\nFor you any hope''s cold and empty.\r\nYou''re walking the hard way going lame.\r\nBetter days seem so far, so far away.\r\nIt''s up to you, come back to reality.\r\n\r\nAnother day confused, it''s hard to learn the lesson\r\ncan''t see the way to quit such a hard situation.\r\nYa soul mother still prays wholeheartedly\r\nfor ya mind to come to reality.', 'a0797837492_2.jpg', 'Good Fellaz', '0', 1, '2014-04-29 17:22:49', 'Good Fellaz - Back to reality.mp3', 'Good Fellaz', 20, 1),
(7, 152, 55, 'Audio', ' Intro jamming ', 'C''mon get "Intro jamming" ', 'a2935604413_2.jpg', 'Good Fellaz ', '4', 1, '2014-04-29 16:58:14', 'Good Fellaz - Intro jamming.mp3', 'Good Fellaz', 30, 0),
(9, 152, 55, 'Audio', ' Dog eat dog', 'We''re going fast but don''t know where.\r\nI''m pushed against you and myself.\r\nThe lines are drawn, I gotta go for broke.\r\nDog eat dog! (x2)\r\n\r\nWishing to live the life can''t get,\r\nbeen taught getting rich''s the only way\r\nNo matter how you overcome.\r\nDog eat dog! (X2)\r\n\r\nIt''s like a jungle sometimes it makes me wonder\r\nhow I keep from going under.', 'images.jpeg', 'Good Fellaz', '3', 1, '2014-04-29 17:41:12', 'Good Fellaz - Dog eat dog.mp3', 'Good Fellaz', 10, 1),
(10, 152, 55, 'Audio', 'Peace out', 'Look and hear!\r\nTake a look around there''re brothers fooling brothers on the streets\r\nIt''s all against all, fuck it I want to find peace!\r\nPEACE! peace out man... this world is going up in flames\r\nand no body wants to take the blame.', 'images.jpeg', 'Good Fellaz', '4', 1, '2014-04-29 17:48:33', 'Good Fellaz - Peace out(ro).mp3', 'Good Fellaz', 43, 0),
(12, 152, 56, 'Audio', ' The fellaz strike back', 'C''mon get "The fellaz strike back"', 'a3646055030_2.jpg', 'Jose A. Lpez', '5', 1, '2014-05-05 18:12:42', 'Good Fellaz - The fellaz strike back.mp3', 'Jose A. LÃ³pez', 0, 1),
(13, 152, 56, 'Audio', 'The fellaz strike back', 'Erosion of the limit 7', 'a1.jpeg', 'Jose A. Lpez', '3', 1, '2014-05-05 22:43:55', 'Good Fellaz - Back to reality.mp3', 'Jose A. LÃ³pez', 0, 0),
(14, 152, 55, 'Audio', 'Not A Bad Thing songs', 'Not A Bad Thing songs', 'a2.jpeg', 'Jose A. Lpez', '5', 1, '2014-05-05 22:49:36', 'Good Fellaz - Dog eat dog.mp3', 'Jose A. LÃ³pez', 0, 1),
(15, 152, 57, 'Video', 'Tech N9ne - Over It', 'I had the chance to see Tech N9ne perform live last week, and Iâ€™m still not Over It. Sure my legs are still sore, my ears still ringing and Iâ€™ve yet to take off my face paint (much to the chagrin of my grandma), but I still want more. While I canâ€™t see Tech live every week, I will certainly settle for a new single; cue Over It, the latest release off of his highly-anticipated Strangeulation album. Obviously, the song is not live, but that doesnâ€™t stop the Strange Music head honcho from taking all the energy and power of a live event and translating it to the cascading production of Michael â€œSevenâ€ Summersâ€™; good luck finding an emcee who can match Techâ€™s potent bars plus the speed and precision with which he delivers them. Sending the explosive cut over the edge is a fiery hook from Ryan Bradley, which gives the effort a unique, almost rock-based foundation. In addition to this effort, Strangeulation (out next month) will also house the previously-featured Hard (A Monster Made It).', 'techn9ne-strangulation.jpg', ' Tech N9ne', '3', 1, '2014-05-06 16:35:22', 'https://www.youtube.com/watch?v=_eFQURn1pZI', ' Tech N9ne', 0, 0),
(16, 152, 57, 'Audio', 'Tech N9ne - Nobody Cares', 'Like all of us, Tech N9ne sometimes gets down on himself and begins to feel like Nobody Cares. Then he remembers that heâ€™s the most successful independent rapper of all time, and the founder of a thriving record label. The first listen (a pre-order buzz record) off the Kansas City phenomâ€™s next collaboration album seems to illustrate both sides of this dynamic; while the fast-paced verses, coming courtesy of Tech and his signees, Stevie Stone and Krizz Kaliko, celebrate the Strange Music armyâ€™s artistic and financial achievements, Kalikoâ€™s sung hook shares the titleâ€™s depressive vibe. Sevenâ€˜s production also has a split personality, transforming from an aggressive, trap-infused groove to a more delicate arrangement when the chorus rolls around. For more fresh material from Tech and his all-star cast of connects, cop Strangeulation when it hits record stores and online retailers Tuesday, May 6. Click here to pre-order the set via Strange Musicâ€˜s official site.', 'techn9ne-strangulation.jpg', ' Tech N9ne', '5', 1, '2014-05-06 16:36:55', 'Good Fellaz - The fellaz strike back.mp3', ' Tech N9ne', 0, 0),
(17, 152, 59, 'Audio', 'Avery Storm - Head Over Heels', 'When you first fall in love, it feels like youâ€™ve just jumped off of a cliff with no parachute. But let Avery Storm extend his hand and catch you before you fall too far. On his latest single, Head Over Heels, the New York singer/songwriter realizes that once the drug of love kicks in, the swirl of emotions can blind your better judgment and may make you see things that arenâ€™t really there. Averyâ€™s voice carries the pain of past relationships so you know heâ€™s speaking from experience. Over the solemn production work of The Ceasars, Queens veteran N.O.R.E. takes a more direct route, setting those lost in the clouds straight with the tale of his own misfortune with a woman. Head Over Heels will be on Averyâ€™s upcoming The Audiobiography project (out May 6), which will feature The Ceasars on the boards throughout.', 'averystorm-audiobiography.jpg', 'Avery Storm', '3', 1, '2014-05-06 16:40:55', 'Good Fellaz - The fellaz strike back.mp3', 'Avery Storm', 0, 0),
(18, 152, 59, 'Audio', 'Avery Storm - Can''t Walk Away', 'Back in late February, Avery Storm told us that sometimes itâ€™s just Easier to Breakup. Well, it seems that is easier said than done, because two months later he still Canâ€™t Walk Away. While his girl may have left, Avery is still with production crew The Caesars. The beatsmiths that produced Easier to Breakup return with another equally potent R&B production, driven by crisp snares and foggy synths. After an opening 16 from raspy veteran Jadakiss, Avery bares his soul, admitting to still having feelings for his ex-girl. The emotion in his voice gives the song its authentic R&B vibe. If you were knocked out by the one-two punch of Avery and The Caesars, get ready to ring the bell again on April 15, when their joint EP, Audiobiography, is released.', 'averystorm-cantwalkaway.jpg', 'Avery Storm', '5', 1, '2014-05-06 16:47:25', 'Good Fellaz - Dog eat dog.mp3', 'Avery Storm', 0, 0),
(19, 152, 60, 'Audio', '2 Chainz - Wuda Cuda Shuda', 'When someone says, â€œI could of, should of, would of,â€ it means that something that could have been done, should have been done and would have been doneâ€¦ well, did not get done. Regardless of the reason, the end result is usually disappointment and upset. 2 Chainz understands this frustration, which is why he is calling out all of the Wuda Cuda Shuda folk who donâ€™t make good on their promises. Production is handled by frequent collaborator Mike WiLL Made It, who keeps things simple behind the boards with a booming bass and some short synthesized keys. Assisted by Lil Boosie, who as of Thursday proclaimed he has the â€œHeart of a Lion,â€ this single will be found on Dos Chainzâ€™ forthcoming free EP, Freebase, due out on Monday, May 5.', '2chainz-woulda.jpg', '2 Chainz', '3', 1, '2014-05-06 16:53:09', '2chainz2.jpg', '2 Chainz', 0, 1),
(20, 152, 60, 'Audio', 'DJ Snake - Turn Down for What (Remix)', 'This. Is. The. Turnt. Remix. After giving the world one of the crazier dance party music videos of all time, DJ Snake and Lil Jon took their own advice for todayâ€™s new club banger, Turn Down For What (Official Remix). The two are joined by the Three Kings Of Turning Up-Juicy J, 2 Chainz, and French Montana. And each of them came bearing giftsâ€”Louie V down to the socks, thots for days, and endless bottle service. The Parisian DJ cuts down on the variations of the electric Middle Eastern melody, compared to the original, but the new additions to the remix roster, specifically Frenchâ€™s Auto-Tune verse, make up for their absence. Be prepared to hear this song on repeat this summer at all public and private gatherings becauseâ€¦ turn down for what?!', 'djsnake-turndownrmx.jpg', '2 Chainz', '3', 1, '2014-05-06 16:56:00', 'Good Fellaz - Intro jamming.mp3', '2 Chainz', 0, 0),
(21, 152, 61, 'Audio', '2 Chainz - Wuda Cuda Shuda', 'This. Is. The. Turnt. Remix. After giving the world one of the crazier dance party music videos of all time, DJ Snake and Lil Jon took their own advice for todayâ€™s new club banger, Turn Down For What (Official Remix). The two are joined by the Three Kings Of Turning Up-Juicy J, 2 Chainz, and French Montana. And each of them came bearing giftsâ€”Louie V down to the socks, thots for days, and endless bottle service. The Parisian DJ cuts down on the variations of the electric Middle Eastern melody, compared to the original, but the new additions to the remix roster, specifically Frenchâ€™s Auto-Tune verse, make up for their absence. Be prepared to hear this song on repeat this summer at all public and private gatherings becauseâ€¦ turn down for what?!', 'djsnake-turndownrmx.jpg', '2 Chainz', '3', 1, '2014-05-06 16:56:55', 'Good Fellaz - Intro jamming.mp3', '2 Chainz', 0, 1),
(22, 152, 61, 'Audio', 'Avery Storm - Head Over Heels', 'When someone says, â€œI could of, should of, would of,â€ it means that something that could have been done, should have been done and would have been doneâ€¦ well, did not get done. Regardless of the reason, the end result is usually disappointment and upset. 2 Chainz understands this frustration, which is why he is calling out all of the Wuda Cuda Shuda folk who donâ€™t make good on their promises. Production is handled by frequent collaborator Mike WiLL Made It, who keeps things simple behind the boards with a booming bass and some short synthesized keys. Assisted by Lil Boosie, who as of Thursday proclaimed he has the â€œHeart of a Lion,â€ this single will be found on Dos Chainzâ€™ forthcoming free EP, Freebase, due out on Monday, May 5.', '2chainz-freebase.jpg', '2 Chainz', '4', 1, '2014-05-06 17:02:48', 'Good Fellaz - Dog eat dog.mp3', '2 Chainz', 0, 0),
(23, 152, 62, 'Audio', 'BOOTS - Dreams', 'You may have heard of the BeyoncÃ© album that ambushed the internet on December 13, 2013. What you may not have known is that a mysterious Roc Nation artist, BOOTS, helped to produce and pen a majority of that LP. Moving out of the shadows and into the spotlight, the former member of the band Blonds has released a new solo single titled Dreams, which just so happens to feature none other than Queen B. The self-produced record flows in the same vein of his hybrid sound of experimental and classical R&B, a good indication of the direction that his work is headed in on his upcoming project, WinterSpringSummerFall. If you decide to buy the single, the profits from your purchase will go to Day One, an organization that helps to prevent teen dating violence. All things considered, not a bad first feature for BOOTS at the Booth.', 'boots.jpg', 'BOOTS', '4', 1, '2014-05-06 17:34:13', 'Good Fellaz - Intro jamming.mp3', 'BOOTS', 0, 1),
(24, 152, 63, 'Audio', 'Taylor Bennett - Creme Brulee', 'Taylor Bennett may have never attended college, but he certainly knows how to get the people going. Heâ€™s already got a knack for making acronyms for the youth of today like GTFUFUN. But CrÃ¨me BrÃ»lÃ©e, a standout record off the Chicago emceeâ€™s new project, is more than just a party anthem. Itâ€™s a look at another, darker side of Taylor that many may have missed in his prior releases. Due to the negative light mainstream media has placed on Chicago with deplorable names like Chiraq, itâ€™s become common knowledge that itâ€™s nearly impossible for a large population of the youth to grow up unaffected by the crime in the streets. Today, we get two examples in Taylor Bennett and fellow Chicago emcee, Lil Herb. The disruptive beat from Satchel Stokes also is in line with the perilous nature of the Windy City. To hear more of what Taylor Bennett envisions popular music to sound like, check out the full Mainstream Music project, which is available for stream and download at the Booth.', 'taylorbennett-mainstreammusic.jpg', 'BOOTS', '3', 1, '2014-05-06 17:36:03', 'Good Fellaz - Back to reality.mp3', 'BOOTS', 0, 1),
(25, 152, 63, 'Audio', 'Taylor Bennett - New Chevy', 'Taylor Bennett may be Chance The Rapperâ€™s brother, but, at least for me, I donâ€™t see him that way; I actually knew about him before I did Chance. Besides canâ€™t he just be his own man? I suspect he could be brothers with the tooth fairy and nobody would care so long as he continues to drop songs like New Chevy. For the most part, Taylor takes a laid-back, sung-rapped approach (matching Brail Beatsâ€™ funky instrumental), but he does flex his muscles by rattling off a few bars with alacrity. Joining Mr. Bennett is fellow Chicagoan King L, who dons a blunted flow to round-out the feel-good, smoker-friendly vibe of the record. Like his last Booth feature spot, Hope, New Chevy will appear on Bennettâ€™s May-bound project, Mainstream Music, due out in six days.', 'taylorbennett-newchevy.jpg', 'Taylor Bennett', '3', 1, '2014-05-06 17:37:16', 'Good Fellaz - Back to reality.mp3', 'Taylor Bennett', 0, 1),
(26, 152, 64, 'Audio', 'Gary Clark Jr. - Bright Lights', 'Itâ€™s tough to improve on something like Gary Clark Jr.â€˜s larger than life Rock and Roll. Good thing tough doesnâ€™t mean impossible. Just take a listen to an updated version of his Bright Lights single. Taken from his newly-released project, Blak And Blu: The Mixtape, this standout record features veteran emcee Talib Kweli, who gives listeners an idea of how the glowing aura of his city can go straight to your head and make you confidently claim things like, â€œYou gonna know my name by the end of the night!â€ Clark, who is signed to Warner Bros., had Nas on the â€˜12 album version of the record, but I donâ€™t see many people complaining about the substitute legend replacement. I mean, how could you with all those filthy guitar chords?\r\nListen to More: Gary Clark Jr. , Talib Kweli , Downloads, Hitmaker, Alternative     Written by Bryan H ', 'garyclarkjr-blakblu.jpg', 'Gary Clark Jr', '3', 1, '2014-05-06 17:45:51', 'Good Fellaz - Intro jamming.mp3', 'Gary Clark Jr', 0, 0),
(27, 152, 65, 'Audio', 'Paris Jones - March EP', 'Los Angeles emcee and producer Paris Jones has come together with The DJBooth to bring listeners his latest street release, the March EP.\r\nThe third in a series of 12 monthly beat tapes Paris plans to release over the course of the year (Its predecessors, January and February, are also available for download in the Booth.), the project packs a total of six original instrumentals from the West Coast buzzmaker, including lead single "The Cold War."\r\nAll tracks feature samples from Janelle MonÃ¡e''s latest album, The Electric Lady.\r\nFans can also check out Paris Jones''s previous albums: Paris Jones - April EP | Paris Jones - February EP | Paris Jones - January EP\r\n', 'parisjones-march.jpg', 'Paris Jones', '4', 1, '2014-05-06 17:47:23', 'Good Fellaz - The fellaz strike back.mp3', 'Paris Jones', 0, 0),
(28, 152, 65, 'Audio', 'Paris Jones - February EP', 'Los Angeles emcee and producer Paris Jones has come together with The DJBooth to bring listeners his latest street release, the February EP.\r\nThe second in a series of 12 monthly beat tapes Paris plans to release over the course of the year (Its predecessor, January, is also available for download in the Booth), the project packs nine fresh tracks from the unsigned buzzmaker, seven of which are original instrumentals, one is a cover ("Made You Look") and the other is a full song ("Say No Way"). The releases are meant to follow in the footsteps of J Dilla projects like Ruff Draft and Jay Loves Japan.\r\nIntrigued? You can find more of Jones'' work on our pages courtesy of the Booth-featured "Ashley Brown," a video single taken from 2013 release You''re Invited to the Assassination of Patrick Campbell.\r\nFans can also check out Paris Jones''s previous albums: Paris Jones - April EP | Paris Jones - March EP | Paris Jones - January EP\r\n', 'parisjones-febep2.jpg', 'Paris Jones', '3', 1, '2014-05-06 17:48:36', 'Good Fellaz - Dog eat dog.mp3', 'Paris Jones', 0, 0),
(29, 152, 66, 'Audio', ' DJ Blaze - Blazing Cuts (March 2014)', 'We in The DJBooth are proud to present the latest installment in Blazing Cuts, a monthly series of free, exclusive mixtapes curated by our very own DJ Blaze.\r\nFor your listening pleasure, Blaze has sifted through the hundreds of records featured in March to find the cream of the crop. The result is a 14-track compilation showcasing the best free new music to hit our front page over the course of the month. This edition of Blazing Cuts features fresh material from XV (My Town), Jarren Benton (Gimmie the Loot), Big K.R.I.T. (Lac Lac) and many more of your favorite artists.\r\n', 'blazingcuts-march14.jpg', ' DJ Blaze', '3', 1, '2014-05-06 18:00:22', 'Good Fellaz - Dog eat dog.mp3', ' DJ Blaze', 0, 0),
(30, 152, 66, 'Audio', 'DJ Blaze - Blazing Cuts (February 2014)', 'We in The DJBooth are proud to present the latest installment in Blazing Cuts, a monthly series of free, exclusive mixtapes curated by our very own DJ Blaze.\r\nFor your listening pleasure, Blaze has sifted through the hundreds of records featured in February to find the cream of the crop. The result is a 15-track compilation showcasing the best free new music to hit our front page over the course of the month. This edition of Blazing Cuts features fresh material from Nipsey Hussle ("Between Us"), Meek Mill ("Know No Better"), Big Sean ("1st Quarter") and many more of your favorite artists.', 'djblaze-blazingcutsfeb14.jpg', 'DJ Blaze', '5', 1, '2014-05-06 18:01:32', 'Good Fellaz - Intro jamming.mp3', 'DJ Blaze', 0, 1),
(31, 152, 67, 'Audio', 'Pete Sayke - Hell On A Highway', 'Yesterday, I stupidly promised a friend a ride home during rush hour; the 20 minute drive ended up taking around 45 minutes. I thought I knew all about Hell On a Highway, but that was before I heard this exclusive DJBooth premiere. If I had been able to bump Pete Saykeâ€˜s latest featured cut during my drive, that rush hour journey would have flown by. Sadly I didnâ€™t, but Iâ€™ll take a simple yet soulful beat like the one turned in here by ThatKidMyself whenever I can get it. A beat this juicy needs to be blessed more than once, which is exactly why the charismatic, heartfelt Sayke grabbed friends Brail, Neak and Slot-A, each of whom add a special dose of flavor to this dense, potent number. Hell On A Highway will be found on Pete and Kidâ€™s forthcoming collabo project, Forever, which will be available for free download via The DJBooth on April 29.', 'petesayke-hellhighway.jpg', 'Pete Sayke', '1', 1, '2014-05-06 18:02:47', 'Good Fellaz - Intro jamming.mp3', 'Pete Sayke', 0, 0),
(32, 152, 67, 'Audio', 'Pete Sayke - Been Dope', 'If youâ€™ve been slacking on your DJBooth readership lately, you might hit play on this brand new single and think, â€œWow, these Midwest cats are talented!â€ Regular visitors to our pages, of course, know that Pete Sayke and his clique have Been Dope for a hot minute now. Thatâ€™s why we decided to bring you the world premiere of single numero uno off the Chicago repperâ€™s next project. Here, the headlinerâ€™s aggressive opening and closing 16s serve as bookends propping up equally deadly guest contributions from Chi-Town buzzmaker Add-2 and Kansas phenom Mike Schpitz. ThatKidMyself, Saykeâ€™s collaborator throughout the project, provides a menacing, sampled backdrop for the emceesâ€™ rhymes, and Windy City fave Slot-A blesses the hook with a few cuts on Mountainâ€™s famous â€œLouder!â€ sample (from Long Red). Feeling it? Then stay tuned for further singles leading up to the 4/29 release of Pete and ThatKidâ€™s DJBooth-hosted street album, Forever.', 'petesayke-beendope2.jpg', 'Pete Sayke', '3', 1, '2014-05-06 18:03:49', 'Good Fellaz - Peace out(ro).mp3', 'Pete Sayke', 0, 1),
(33, 152, 68, 'Audio', 'Styles P. - Sour', 'Time for a pop quiz, Booth readers: what does Styles P.â€˜s weed have in common with his haters? You guessed it: theyâ€™re both Sour. Not featured on our front page since November of 2013, when he contributed a guest 16 to Kid Inkâ€˜s Fired Up, the Northeastern mainstay returns to spark a blunt and rub enemiesâ€™ noses in his success on single numero uno off his next studio album. Not about to pass up the chance to ball on envious lames, D-Block colleague Jadakiss grabs the mic to spit a gruff opening 16, and U.O.E.N.O hitmaker Rocko slurs his way through a guest hook. KnuckleHead mans the boards, backing the collaboratorsâ€™ rhymes with subdued synth arpeggios and leisurely, whip-ready percussion. Stylesâ€™s next full-length, Phantom and The Ghost, is scheduled to drop on April 29. In the meantime, of course, weâ€™ll keep you supplied with the latest song releases off the set.', 'stylesp-phantomghost.jpg', 'Styles P.', '3', 1, '2014-05-06 18:08:16', 'Good Fellaz - Dog eat dog.mp3', 'Styles P.', 0, 0),
(34, 152, 69, 'Audio', 'Grynch - Carry On', 'When you work at something long enough, you can miss the point where you go from student to teacher. Whether he knows it or not, Seattleâ€™s Grynch has reached that point. In the new Griff J-directed video for his latest single, Carry On, we get glimpses of a younger Grynch reading The Source and studying West Coast greats like Dr. Dre and Warren G, edited in with a present day version of the indie emcee before he gets ready for a live show. During this time span there have been a lot of ups and downs, as often happens when it comes to something or someone you love, but Grynch has managed to stick it out with four albums releases over 10 years of rocking the mic. And it doesnâ€™t end here. The Elan Wright and Nima Skeemz produced cut will be on Grynchâ€™s upcoming Street Lights LP, which will be available on April 29. Itâ€™s nice to think that somewhere out there, thereâ€™s a kid listening to the Timeless EP after school and writing his or her own raps to those beats.', 'grynch-carryon.jpg', 'Grynch', '3', 1, '2014-05-06 18:09:56', 'Good Fellaz - Peace out(ro).mp3', 'Grynch', 0, 0),
(35, 152, 69, 'Audio', 'Grynch - Mister Rogers (Remix)', 'Hey Neighbor! Welcome to the hip-hop hood, where everyday is beautiful and Grynch drops dope cuts with his neighbors; on this trip, Slug (of Atmosphere) and Bambu. In a remake his 2011 cut, Mister Rogers, Grynch will have listeners feeling like theyâ€™ve taken a walk into the Neighborhood of Make-Believe because the record is almost too good to be true. While the single belongs to Grynch, both guest emcees really make it their own. Hell, even veteran producer Jake One shares in the warmth of the spotlight, providing a laid-back, sample-driven foundation. Itâ€™s a shame these guys arenâ€™t actually neighbors because that is one city I wouldnâ€™t mind residing in. Want more? Gynch will be releasing a 12â€ single with Budo in April, in addition to working on a full-length project set for release sometime later this year.', 'grynch-mrrogersrmx.jpg', 'Grynch', '3', 1, '2014-05-06 18:10:51', 'Good Fellaz - Dog eat dog.mp3', 'Grynch', 0, 0),
(36, 152, 70, 'Audio', 'Bas - My Ngga Just Made Bail', 'If Danny Oceanâ€™s growing team made a video about getting out of jail, it would sound and look a lot like this. Dreamvilleâ€˜s Bas drops off the Ramble West-directed visuals for his celebratory new single, My N*gga Just Made Bail. The classical guitar melody puts you right at ease as the sun sets on Basâ€™ estate, just how itâ€™s supposed to be when your best friend makes bail. In addition to assisting on the hook, label boss J. Cole delivers a solid verse, trumping Kanyeâ€˜s New Slaves metaphor. You can find this single on Basâ€™ recently released major label debut, Last Winter, out now.', 'bas-lastwinter.jpg', 'Bas', '3', 1, '2014-05-06 18:17:52', 'Good Fellaz - Back to reality.mp3', 'Bas', 0, 0),
(37, 152, 70, 'Audio', 'Bas - Charles de Gaulle To JFK', 'Next Wednesday, Iâ€™m gonna be flying from NYC to Paris to visit friends and enjoy a little R&R. (Yes, that means youâ€™ll be deprived of my impeccable blurb stylings for a couple weeks.) Coincidentally, Bas recently made the reverse journey, traveling from Charles de Gaulle to JFK. Whereas Iâ€™m going to be cooped up in coach, however, the Dreamville signee enjoyed all the amenities of first class, sipping complimentary Hennessey and mimosas while being fed sushi by a beautiful woman. Am I jealous? Just a little. But I canâ€™t begrudge him for his creature comforts when heâ€™s delivering bars as skillful and engaging as the ones he spits here, accompanied by producer Ron Gilmoreâ€˜s glittering keyboard chords. This cut is single numero uno off Basâ€™s major-label debut, Last Winter. Due out April 29, the LP will be the first project to drop through Dreamvilleâ€˜s new deal with Interscope.', 'bas-lit.jpg', 'Bas', '3', 1, '2014-05-06 18:18:39', 'Good Fellaz - The fellaz strike back.mp3', 'Bas', 0, 0),
(38, 152, 71, 'Audio', 'Rapper Big Pooh - The Crew', 'First in Flight State veteran Rapper Big Pooh and West Coast mainstay Roc C may not be blood kin, but they and their respective cliques are as tight as the closest-knit familiesâ€¦. mafia or otherwise. On The Crew, single numero uno off their forthcoming collaborative full-length, the partners-in-rhyme join forces to teach us a little something about loyalty and allegiance. Though theyâ€™re held together by a strong communal spirit (â€œEverybody to a man responsible for each other.â€), each individual can easily stand on his or her own; on the back, Roc refers to his inner circle as, â€œjust a bunch of leaders.â€ Praise handles production duties, cooking up a gritty chopped-sample beat to back the collaboratorsâ€™ steadfast bars. For The Crew and much more, cop the emceesâ€™ Trouble in the Neighborhood LP, out now.\r\nUpdate: We have added the Hayden Baptiste-directed visuals for Pooh and Rocâ€™s The Crew single.', 'bigpoohrocc-trouble.jpg', 'Rapper Big Pooh', '3', 1, '2014-05-06 18:20:22', 'Good Fellaz - Intro jamming.mp3', 'Rapper Big Pooh', 0, 0),
(39, 152, 72, 'Audio', 'Blitz The Ambassador - Make You No Forget', 'Blitz the Ambassadorâ€˜s last EP, streamable in the Booth as of August 2013, was a dope body of work, but it undoubtedly left fans hungry for something a bit more substantial. After all, a title like â€œThe Warm Upâ€ implies a main event to come. Well, those craving more fresh music wonâ€™t have to wait much longer to be fully satisfied; now that his limbs are loosened up and his blood is pumping, heâ€™s nearly ready to unleash his junior studio album. Coming on the heels of Januaryâ€™s non-featured SUCCESS, second single Make You No Forget offers a taste of the memorable material in store. Here, Blitzâ€™s effervescent, brass-laced boardwork sets the stage for verses which find the Brooklyn resident indicting social injustice as he celebrates his Ghanaian roots. Seun Kuti, the son of Afrobeat pioneer Fela Kuti, assists on the guest tip. The headliner directs the vibrant accompanying visuals, which are produced by Accra Dot Alt and were filmed in his native country. Feeling it? Then donâ€™t forget to cop Afropolitan Dreams when it drops via iTunes on Tuesday, April 29.', 'blitz-afropolitandreams.jpg', 'Blitz', '5', 1, '2014-05-06 18:24:59', 'Good Fellaz - Peace out(ro).mp3', 'Blitz', 0, 0),
(40, 152, 73, 'Audio', 'Connor Evans - Summer Night Jam', 'I donâ€™t know about yâ€™all but, after the brutal winter that just ended, Iâ€™m even more excited than usual for the balmy evenings of June, July and August. Connor Evans clearly agrees; thatâ€™s why the Coachella Valley, Cali nativeâ€™s gotten a head start on crafting music for the season. Making its world premiere right here on our front page, Summer Night Jam finds the Booth fave enjoying the beautiful weather with a special girl by his side. To back his breezy, heartfelt bars, BHB cooks up a mellow beat featuring a sample from Lil Robâ€˜s similarly-themed Summer Nights. For this cut, the previously-featured Familia and much more, cop Evanâ€™s So Cal Soul mixtape when it drops digitally on Monday, April 28.', 'connorevans-summernightjam.jpg', 'Connor Evans', '5', 1, '2014-05-06 18:26:15', 'Good Fellaz - Intro jamming.mp3', 'Connor Evans', 0, 1),
(41, 152, 73, 'Audio', 'Connor Evans - Familia', 'Earlier this month, Connor Evans gave us a much-needed respite from the late-winter chill in the form of blazing-hot single Winterlude. Now, the Golden State reader fave is back to ring in the springtime with another fresh cut off his next independent full-length. Though this record is titled Familia (a double-entendre the artist pedantically explains between verses), he spends as much time busting shots at his enemies as he does big-upping his clique. Over frequent collaborator BHBâ€˜s dissonant samples and chopped keys, he snarls, â€œMotherf**king hater / Watch me floatinâ€™ by you like a motherf**king gator.â€ Michael Tribby and Adrian Martin cook up a set of visuals to match the songâ€™s grimy sound. So Cal Soul is slated to drop digitally on Tuesday, 4/28. Keep it locked for the latest singles off the set, as well as for Connorâ€™s contribution to our exclusive freestyle series, also coming in April.', 'connorevans.jpg', 'Connor Evans', '4', 1, '2014-05-06 18:27:00', 'Good Fellaz - Peace out(ro).mp3', 'Connor Evans', 0, 0),
(42, 152, 74, 'Audio', 'Maryann - #CookingForBae', 'Upwards of half a year has passed since Maryann last stepped into the DJBooth with a fresh feature, so fans on our pages are undoubtedly starving for new material. Not a moment too soon, the N-Crowd songstress returns with a piping-hot single for your aural delectation. On #CookingForBae, the Sacramento native draws an analogy between what goes on in the kitchen and the heat she and her man produce between the sheets. The genre title â€œ#BedroomTrap,â€ invoked in the cutâ€™s SoundCloud writeup, could hardly be a better description of the recordâ€™s sound; N8 The Gr8â€˜s beat incorporates the hi-hat rolls and booming kicks of contemporary hip-hop, while maintaining a cozy, sensual atmosphere. Maryannâ€™s Futuristic Always LP has yet to be assigned a drop date, but weâ€™ll keep you supplied with the latest news and tunes leading up to its arrival.', 'maryann-youandme.jpg', 'Maryann', '3', 1, '2014-05-06 18:31:50', 'Good Fellaz - Peace out(ro).mp3', 'Maryann', 0, 0),
(43, 152, 74, 'Audio', 'T-Jay Beats - Fruits of Labor', 'Two years ago, when he was just 16 years old, T-Jay Beats began his career as a producer. Now, two birthdays and a signing to independent label TruDREAM Entertainment later, the producer born Tom Jackowski has released his first beat tape, the appropriately titled Fruits of Labor.\r\nAccording to the Chicago native, whose boardwork was heard accompanying Mick Jenkins Booth-exclusive freestyle "Steam," the title and concept behind Fruits Of Labor represents the hard work that must be invested in order to be successful.\r\nEach of the project''s nine tracks represents a different period of his personal journey to success.', 'maryann-cookingforbae.jpg', 'Maryann', '2', 1, '2014-05-06 18:32:58', 'Good Fellaz - The fellaz strike back.mp3', 'Maryann', 0, 1),
(44, 152, 75, 'Audio', 'Maryann - CookingForBae', 'Upwards of half a year has passed since Maryann last stepped into the DJBooth with a fresh feature, so fans on our pages are undoubtedly starving for new material. Not a moment too soon, the N-Crowd songstress returns with a piping-hot single for your aural delectation. On #CookingForBae, the Sacramento native draws an analogy between what goes on in the kitchen and the heat she and her man produce between the sheets. The genre title â€œ#BedroomTrap,â€ invoked in the cutâ€™s SoundCloud writeup, could hardly be a better description of the recordâ€™s sound; N8 The Gr8â€˜s beat incorporates the hi-hat rolls and booming kicks of contemporary hip-hop, while maintaining a cozy, sensual atmosphere. Maryannâ€™s Futuristic Always LP has yet to be assigned a drop date, but weâ€™ll keep you supplied with the latest news and tunes leading up to its arrival.', 'maryann-cookingforbae.jpg', 'Maryann', '3', 1, '2014-05-06 18:34:55', 'Good Fellaz - Dog eat dog.mp3', 'Maryann', 0, 0),
(45, 152, 75, 'Audio', 'Maryann - Love Music', 'Some songs, like those which are accompanied by a stupid dance or are about a day of the week (Friday to be exact), make me hate music. Thankfully, there are artists like Maryann,  who create songs that make me Love Music all over again. While this is her first Booth feature spot, Maryann has no problem getting intimate with her fans. As N8 the Gr8â€™s steamy, ambient beat, sprinkled with little effects and twinges, shimmers, Maryann wrestles with listeners between the sheets. While the video is undoubtedly captivating, her effortless, floating vocals are really what youâ€™ll remember and crave more of. If you Love Music, than you have to keep her upcoming album, Futuristic Always, on your radar. The set is scheduled for release this fall.', 'maryann-lovemusic.jpg', 'Maryann', '2', 1, '2014-05-06 18:35:47', 'Good Fellaz - Dog eat dog.mp3', 'Maryann', 0, 1),
(46, 152, 74, 'Audio', 'Verbal Kent - Raponomics', 'In economics, everything proceeds according to the laws of supply and demand. As a practitioner of Raponomics Verbal Kent does things a bit differently; the Chi-town rhymesayer supplies the kind of music he wants to supply, and â€œif you ainâ€™t feelinâ€™ [him], then too bad!â€ Though it may limit his potential for mainstream success, the uncompromising attitude the Ugly Heroes member showcases on his first solo feature is sure to score him points among underground heads in The DJBooth. Backed by the chopped guitar and vocal samples of project collaborator Khrysis, Kent mixes diabolical battle rhymes with references to Margaret Thatcher and the Ottoman Empire. For more hard-hitting beats and allusive bars, check out Kent and Khrysisâ€™s Sound of the Weapon LP when it drops February 18, via Mello Music Group.', 'verbalkent2.jpg', 'Verbal Kent', '4', 1, '2014-05-06 18:41:26', 'Good Fellaz - Intro jamming.mp3', 'Verbal Kent', 0, 1),
(47, 152, 75, 'Audio', 'Mike Boyd - ...Note the Sarcasm', 'In late March, Enfield, Nova Scotia native Mike Boyd released an 11-track LP, entitled ...Note the Sarcasm, which caught our collective ear here at The DJBooth.\r\nAfter listening to standout tracks like promo single "Mr. Mike" and the Booth-approved dual single, "Small World / Fly Like A Butterfly," it was clear that we needed to further introduce our audience to Boyd''s unique on-the-mic approach and charismatic flow.\r\nIn an effort to "take it back to the days of real hip-hop, with a touch of comedy and sarcasm," the Halflife Records signee and his label boss Classified (who produced the entire project) have created a complete body of work that is short on effects and heavy on ingenuity.\r\nFeaturing guest appearances from D-Sisive, Madchild, Naledge, Shad and more, ...Note the Sarcasm is currently available in stream form below, in addition to being available for purchase via iTunes. ', 'verbalkent2.jpg', 'Mike Boyd', '5', 1, '2014-05-06 18:42:37', 'Good Fellaz - Peace out(ro).mp3', 'Mike Boyd', 0, 1),
(48, 152, 75, 'Audio', 'Tech N9ne - Nobody Cares', 'Like all of us, Tech N9ne sometimes gets down on himself and begins to feel like Nobody Cares. Then he remembers that heâ€™s the most successful independent rapper of all time, and the founder of a thriving record label. The first listen (a pre-order buzz record) off the Kansas City phenomâ€™s next collaboration album seems to illustrate both sides of this dynamic; while the fast-paced verses, coming courtesy of Tech and his signees, Stevie Stone and Krizz Kaliko, celebrate the Strange Music armyâ€™s artistic and financial achievements, Kalikoâ€™s sung hook shares the titleâ€™s depressive vibe. Sevenâ€˜s production also has a split personality, transforming from an aggressive, trap-infused groove to a more delicate arrangement when the chorus rolls around. For more fresh material from Tech and his all-star cast of connects, cop Strangeulation when it hits record stores and online retailers Tuesday, May 6. Click here to pre-order the set via Strange Musicâ€˜s official site.', 'techn9ne-strangulation.jpg', 'Tech N9ne', '3', 1, '2014-05-06 18:59:34', 'Good Fellaz - Dog eat dog.mp3', 'Tech N9ne', 0, 1),
(49, 152, 75, 'Audio', 'Mike Boyd - Small World / Fly like a Butterfly', 'Most newcomers to our pages wait until after their Booth debut to bring us a second feature. T-Dot rhymesayer Mike Boyd, however, has decided to give us two servings of dope music all at once. Which is somewhat ironic, because the first half is all about doing it small. Yes, I said small. On Small World, Boyd and guest spitter D-Sisive take turns flaunting their tiny bankrolls and compact cars. (Theyâ€™re undercompensating, if you know what I mean.) Two-thirds of the way in, the transformation of Classifiedâ€˜s piano-loop beat into a harder-hitting 6/8 groove heralds the arrival of Fly Like a Butterfly, a more braggadocious number showcasing the versatility of the headlinerâ€™s flow. Director Philip Sportel turns in an official video that reflects the recordâ€™s split personality. For both of the aforementioned joints and much more, check out Boydâ€™s ...Note the Sarcasm LP, available now on iTunes.', 'mikeboyd-notethesarcasm.jpg', 'Mike Boyd', '3', 1, '2014-05-06 19:01:03', 'Good Fellaz - Peace out(ro).mp3', 'Mike Boyd', 0, 1),
(50, 152, 76, 'Audio', 'Tech N9ne - Nobody Cares', 'Lorem Lipsum', '106.jpeg', 'Tech N9ne', '3', 1, '2014-05-06 22:59:52', 'Good Fellaz - Dog eat dog.mp3', 'Tech N9ne', 0, 0),
(51, 152, 77, 'Audio', 'The fellaz strike back', 'Lorem Lipsum', 'blazingcuts-march14.jpg', 'Mike Boyd', '3', 1, '2014-05-06 23:00:53', 'Good Fellaz - Peace out(ro).mp3', 'Mike Boyd', 0, 1),
(52, 152, 57, 'Audio', 'new song 2013 English hot girl {open your eyes} ', 'Future lady gaga or beyonce.', 'mqdefault.jpg', 'Lady Gaga', '3', 1, '2014-05-07 17:52:53', 'Good Fellaz - Intro jamming.mp3', 'Lady Gaga', 0, 1),
(54, 152, 61, 'Video', '4 Painfully Awkward Live News Moments ', ' Published on Mar 4, 2013\r\nDistractify.com Job Application http://bit.ly/13C51T2\r\nhttp://2bucksentertainment.com This channel would not be possible without your contributions. Send in funny clips you find at my site!', 'default.jpg', '2 Chainz', '3', 1, '2014-05-07 18:23:46', 'https://www.youtube.com/watch?v=sC2nElyx7Ds', '2 Chainz', 40, 1),
(55, 152, 64, 'Video', '3 Hours Best English LoveSong', 'Songlist\r\n98 Degrees I Do Cherish You.\r\nBorn For You - David Pomeranz\r\nK-Ci & JoJo - All My Life\r\nCeline Dion - 086 - My Heart Will Go On (Love Theme From Titanic )\r\nBon Jovi - Always\r\nwill of the wind.\r\nFaithfully - Journey\r\nWestlife - If I Let You Go\r\nBecause of You by 98 degree.mp3\r\nGuy Sebastian - Angels Brought Me Here\r\nlike a rose a1\r\nwalking in the rain a1\r\nJourney - Open Arms\r\nAerosmith - I Don''t Want To Miss A Thing\r\n98 Degrees - I Do (Cherish You)\r\nAir Supply - All Out Of Love\r\nHeart - Alone\r\nStyx - 092 - Babe\r\nOne Sweet Day - Mariah Carey &amp; Boyz II Men\r\nBryan White - God Gave Me You\r\nBoyz II Men - I''ll Make Love To You\r\nLauren Christy - Steep\r\nRonan Keating - When You Say Nothing At All\r\nExtreme - More Than Words\r\nBoyzone - 01 - No Matter What\r\nA1 - One Last Song\r\nRoxette - It Must Have Been Love\r\nAlicia Keys - Fallin''\r\nWhitney Houston - I Will Always Love You\r\nDiana Ross - If We Hold On Together\r\nBorn For You - David Pomeranz.\r\nForevermore - Side A\r\nWestlife - I Lay My Love On You\r\nJourney - Faithfully\r\nAll My Life - KCI & Jojo\r\nBoyzone - No Matter What\r\nA1 Song One more try.\r\nO-Town - All or nothing at all\r\nDiana Ross - 029 - Endless Love\r\nThe Past - Ray Parker Jr\r\nAir Supply - All Out Of Love\r\nBoyz II Men - I''ll Make Love To You\r\nLoneStar - Amazed\r\nN''Sync - This I Promise You\r\nDiana Ross & Lionel Richie - Endless Love\r\nO-Town All or Nothing\r\nDavid Pomeranz_ If You Walked Away\r\nJim Brickman f/Martina McBride - The Gift\r\nbeauty and madness - fra lippo lippi\r\nDance_With_My_Father__Luther_Vandross\r\nThe Jets - Make It Real\r\nGoo Goo Dolls - Iris\r\nBoyz II Men - On Bended Knee\r\nto mp3 download', 'mqdefault.jpg', 'Maryann', '3', 1, '2014-05-07 21:36:55', 'https://www.youtube.com/watch?v=koJlIGDImiU', 'Maryann', 0, 0),
(57, 152, 65, 'Video', 'Paris Jones - February EP', 'Testing', 'default.jpg', 'Paris Jones', '3', 1, '2014-05-07 22:08:51', 'https://www.youtube.com/watch?v=rp4UwPZfRis', 'Pete Sayke', 0, 0),
(109, 152, 57, 'Audio', 'Good Fellaz - Back to reality', 'Testing', 'a7.jpeg', '2 Chainz', '3', 1, '2014-05-08 18:36:12', 'Good Fellaz - Back to reality.mp3', '2 Chainz', 0, 0),
(110, 152, 57, 'Audio', 'Good Fellaz - Dog eat dog', 'Testing', 'a7.jpeg', '2 Chainz', '3', 1, '2014-05-08 18:36:12', 'Good Fellaz - Dog eat dog.mp3', '2 Chainz', 0, 0),
(111, 152, 57, 'Audio', 'Good Fellaz - Intro jamming', 'Testing', 'a7.jpeg', '2 Chainz', '3', 1, '2014-05-08 18:36:12', 'Good Fellaz - Intro jamming.mp3', '2 Chainz', 0, 0),
(112, 152, 57, 'Audio', 'Good Fellaz - Peace out(ro)', 'Testing', 'a7.jpeg', '2 Chainz', '3', 1, '2014-05-08 18:36:12', 'Good Fellaz - Peace out(ro).mp3', '2 Chainz', 0, 0),
(113, 152, 57, 'Audio', 'Good Fellaz - The fellaz strike back', 'Testing', '', '2 Chainz', '3', 1, '2014-05-08 18:36:14', 'Good Fellaz - The fellaz strike back.mp3', '2 Chainz', 0, 1),
(114, 152, 57, 'Audio', 'Good Fellaz - Back to reality', 'Testing', '', '2 Chainz', '3', 1, '2014-05-08 18:45:06', 'Good Fellaz - Back to reality.mp3', '2 Chainz', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE IF NOT EXISTS `staticpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `register_date` varchar(100) NOT NULL,
  `profile_image` varchar(250) NOT NULL,
  `contact` int(11) NOT NULL,
  `home_town` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `registertype` varchar(500) NOT NULL,
  `devicetype` varchar(500) NOT NULL,
  `fbpassword` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `usertype_id`, `status`, `register_date`, `profile_image`, `contact`, `home_town`, `first_name`, `last_name`, `summary`, `registertype`, `devicetype`, `fbpassword`) VALUES
(152, 'admin', 'a92b1b8321c0da8341ff797a5c04256db285a93c', 'trigma.it@trigma.co.in', '2c2317627a69e6a8f059c93e8daa7624e30df6e22c133cfabf4bd2a88c436e38c95f7d45d5aba41e314e5f04f1cf9af35a24ed027f484a1c1d2d07d38755550c', 5, '1', '25/04/2014', 'images123456.jpeg', 1236547890, 'Australia', 'Just', 'Cool', '', '', '', ''),
(193, 'ram', 'f9d772d9a5e5c40a679210b626c95dd68ed00bc5', 'k.nimawat@gmail.com', '', 6, '1', '30/04/2014', '', 0, '', '', '', '', 'custom', 'android', ''),
(197, 'kuldeep', '29b7ccb40531ef634267b5530c9f9ae7be039e23', 'nimawat.kuldeep@gmail.com', '', 6, '1', '02/05/2014', '', 0, '', '', '', '', 'custom', 'android', ''),
(198, 'test', '4e28b5fbb5f08b37f6de19ff4b4c17fe2e63cd92', 'test@gmail.com', '567345650b9d33853f32264b8ffc3d3d4d32ed38a88edd29fc950350005cc5dfdc5ce4930dfe5e8cd5b6d7e6a90479375b57918612a67c242b9093ecf803e1eb', 6, '1', '02/05/2014', '', 0, '', '', '', '', 'custom', 'android', ''),
(196, 'kuldeep.nimawat', '2317f6b5a8a886e9fa89eda59bc93b1640f02bd3', 'kuldeep.nimawat@yahoo.in', '', 6, '1', '02/05/2014', '', 0, '', '', '', '', 'facebook', 'android', ''),
(199, 'test1', '4e28b5fbb5f08b37f6de19ff4b4c17fe2e63cd92', 'test1@gmail.com', 'd29d5eb871a31b985621189049d7cca0dbaa1f05df9f3f4726150eb5b84ca10374e06c155b1421797ed6029267c1949210f3359ee7dc27954469883b17aed838', 6, '0', '02/05/2014', '', 0, '', '', '', '', 'custom', 'android', ''),
(200, 'khan.imran.gauri', '2317f6b5a8a886e9fa89eda59bc93b1640f02bd3', 'khan.imran.gauri@gmail.com', '', 6, '1', '09/05/2014', '', 0, '', '', '', '', 'facebook', 'android', ''),
(201, 'hello@gmail.com', 'a92b1b8321c0da8341ff797a5c04256db285a93c', 'hell@gmail.com', '', 6, '1', '26/05/2014', '', 0, '', '', '', '', 'custom', 'android', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(250) NOT NULL,
  `Authorities` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `group_name`, `Authorities`, `status`) VALUES
(5, 'Administrators', 'All', 1),
(6, 'users', 'Few', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
