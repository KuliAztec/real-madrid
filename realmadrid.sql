-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 08:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realmadrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_user` int NOT NULL,
  `nama_manager` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id_user`, `nama_manager`, `email`, `password`) VALUES
(102, 'admin', 'admin@admin.com', '$2y$10$tryTHnJ4kMD77PZO0EIvuuAy5gjOX8i5q/l.XPcecpXbaG/LCVD0.');

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int NOT NULL,
  `question` text NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES
(1, 'Sepak bola berasal dari dua kata yakni sepak dan bola, sepak yang berarti...', 'Menendang menggunakan kedua kaki', 'Melayang di udara', 'Mendorong kaki', 'Memukul bola', 'Mendorong kaki'),
(2, 'Siapa Presiden Real Madrid?', 'Martin Edwards', 'Florentino Perez', 'Erick Thohir', 'Lord Attenborough', 'Florentino Perez'),
(3, 'Siapakah kiper utama Real Madrid dalam kemenangan Liga Champions 2022?', 'Keylor Navas', 'Iker Casillas', 'Thibaut Courtois', 'Diego Lopez', 'Thibaut Courtois'),
(4, 'Siapakah Pimpinan Pertama Real Madrid?', 'Julian Palacios', 'Joan Laporta', 'Florentino Perez', 'Lord Attenborough', 'Julian Palacios'),
(5, 'Apa nama Stadion Real Madrid?', 'Old Trafford', 'Stamford Bridge', 'Olimpiade Lluis Companys', 'Santiago Bernabeu', 'Santiago Bernabeu'),
(6, 'Siapakah pemain yang dijuluki \"El Bicho\" oleh penggemar Real Madrid?', 'Cristiano Ronaldo', 'Karim Benzema', 'Luka Modric', 'Sergio Ramos', 'Cristiano Ronaldo'),
(7, 'Siapa pelatih yang membawa Real Madrid meraih Liga Champions 2018?', 'Carlo Ancelotti', 'Zinedine Zidane', 'José Mourinho', 'Vicente del Bosque', 'Zinedine Zidane'),
(8, 'Siapakah pemain yang menjadi top skor sepanjang masa di Real Madrid?', 'Alfredo Di Stefano', 'Karim Benzema', 'Cristiano Ronaldo', 'Raul', 'Cristiano Ronaldo'),
(9, 'Siapa yang menjadi kapten Real Madrid setelah Sergio Ramos pindah ke PSG?', 'Luka Modric', 'Karim Benzema', 'Dani Carvajal', 'Nacho Fernandez', 'Karim Benzema'),
(10, 'Pada tahun berapa Real Madrid pertama kali memenangkan Liga Champions?', '1955', '1956', '1960', '1965', '1956'),
(11, 'Siapa pemain legendaris yang dikenal dengan julukan \"El Profesor\" dan bermain untuk Real Madrid?', 'Zinedine Zidane', 'Michel Platini', 'Xabi Alonso', 'Luka Modric', 'Xabi Alonso'),
(12, 'Stadion manakah yang menjadi markas besar Real Madrid?', 'Camp Nou', 'Santiago Bernabeu', 'Wanda Metropolitano', 'Old Trafford', 'Santiago Bernabeu'),
(13, 'Siapa pemain yang mencetak gol terbanyak dalam final Liga Champions untuk Real Madrid?', 'Cristiano Ronaldo', 'Karim Benzema', 'Alfredo Di Stefano', 'Raul', 'Cristiano Ronaldo'),
(14, 'Berapa kali Real Madrid memenangkan La Liga pada abad ke-21 (2001 hingga 2021)?', '5', '7', '10', '11', '7'),
(15, 'Siapakah pelatih yang membawa Real Madrid memenangkan La Decima (Liga Champions ke-10)?', 'Vicente del Bosque', 'Carlo Ancelotti', 'Zinedine Zidane', 'José Mourinho', 'Carlo Ancelotti'),
(16, 'Pada tahun berapa Real Madrid memenangkan La Liga terakhir kali sebelum musim 2020/2021?', '2015', '2017', '2019', '2020', '2020'),
(17, 'Siapa yang menjadi pemain dengan jumlah penampilan terbanyak sepanjang sejarah Real Madrid?', 'Sergio Ramos', 'Iker Casillas', 'Raul', 'Cristiano Ronaldo', 'Iker Casillas'),
(18, 'Siapa pemain yang dijuluki \"The Galáctico\" yang bergabung dengan Real Madrid pada tahun 2000?', 'Luis Figo', 'David Beckham', 'Ronaldo Nazário', 'Zinedine Zidane', 'Luis Figo'),
(19, 'Pada tahun berapa Cristiano Ronaldo pindah ke Real Madrid?', '2007', '2009', '2011', '2013', '2009'),
(20, 'Siapa yang menjadi pelatih pertama Real Madrid setelah pendirian klub?', 'Santiago Bernabeu', 'José Mourinho', 'Luis Molowny', 'Arthur Johnson', 'Arthur Johnson'),
(21, 'Berapa banyak trofi Liga Champions yang dimiliki oleh Real Madrid hingga 2023?', '11', '13', '14', '17', '14'),
(22, 'Pemain manakah yang bergabung dengan Real Madrid dari Tottenham Hotspur pada 2013?', 'Luka Modric', 'Gareth Bale', 'Christian Eriksen', 'Harry Kane', 'Gareth Bale'),
(23, 'Siapakah pemain yang memiliki nomor punggung 7 setelah Cristiano Ronaldo meninggalkan Real Madrid?', 'Eden Hazard', 'Karim Benzema', 'Vinicius Jr.', 'Luka Modric', 'Eden Hazard'),
(24, 'Pada tahun berapa Real Madrid pertama kali memenangkan Copa del Rey?', '1907', '1910', '1920', '1934', '1910'),
(25, 'Siapa pemain yang menjadi rekrutan termahal dalam sejarah transfer Real Madrid hingga 2023?', 'Gareth Bale', 'Cristiano Ronaldo', 'Eden Hazard', 'Luka Modric', 'Gareth Bale');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id_sejarah` int NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id_sejarah`, `tahun`, `isi`) VALUES
(1, '(1902-1910)', 'Olahraga baru dari Inggris bernama sepak bola mulai merambah negara kita. Penerapannya yang cepat berarti bahwa pada akhir abad ke-19 dan awal abad ke-20, organisasi-organisasi pertama dibentuk untuk mempraktikkannya. Salah satunya adalah Madrid Football Club, pendahulu Real Madrid. Julián Palacios adalah pemimpin pertamanya, tetapi Juan Padrós-lah yang secara resmi membentuk lembaga tersebut (1902). Minat tumbuh sedemikian rupa sehingga Madrid mengusulkan diadakannya turnamen sebagai penghormatan kepada raja Alfonso XIII. Inisiatif ini menjadi Copa de España.\r\n'),
(2, '(1911-1920)', 'Sepak bola Spanyol sedang melalui masa sulit dan ketidakpastian. Real Madrid bukannya tidak terpengaruh oleh masalah-masalah ini, namun mereka dapat mengatasinya berkat kerja bagus dari para direkturnya. Dengan bertambahnya basis penggemar, mereka melihat perlunya mengubah lokasi untuk memfasilitasi jumlah pengunjung dan mendapatkan lebih banyak uang. Klub pindah ke Stadion O\'Donnell. Saat itulah pejabat tinggi Raja Spanyol memberi Madrid gelar \'Real\' (1920).'),
(3, '(1921-1930)', 'Di awal tahun 20-an, Real Madrid kembali menjadi pionir di sepak bola Spanyol. Tim ini melakukan serangkaian perjalanan ke luar negeri, menjadikannya perintis internasional. Sebagai hasil dari pertumbuhan klub, dua perubahan stadion dilakukan pada periode ini. Pertama, ke Velódromo de Ciudad Lineal, dan kemudian Chamartín dibangun. Yang terakhir menjadi tuan rumah pertandingan pertama di Campeonato de Liga yang baru dibuat (1928).'),
(4, '(1931-1940)', 'Kedatangan Ricardo Zamora segera disusul oleh Ciriaco dan Quincoces. Ketiganya membentuk pertahanan terbaik di dunia. Hasilnya adalah empat gelar dalam beberapa tahun (dua di La Liga dan dua Copa). Benih-benih reputasi Madrid sebagai pemenang telah ditaburkan, namun pecahnya Perang Saudara menghentikan keberhasilan mereka.\r\n'),
(5, '(1941-1950)', 'Periode ini akan memunculkan kisah sukses entitas di masa depan dan juga persaingan dengan Barcelona. Stadion Chamartín harus dibangun kembali dan tim baru harus dibentuk dan dipercepat untuk kompetisi. Berkat Santiago Bernabéu, semua tantangan ini dapat diatasi dengan penuh percaya diri. Pada dekade inilah fondasi ditetapkan untuk apa yang kemudian dikenal sebagai ‘Klub Terbaik Abad Kedua Puluh’.'),
(6, '(1951-1960)', 'Ini adalah dekade yang cemerlang. Sekelompok pemain, dipimpin oleh Alfredo Di Stéfano, menempatkan Real Madrid di puncak sepakbola. Tim yang memenangkan lima Piala Eropa berturut-turut membuat kagum dunia dengan gaya sepak bolanya yang spektakuler. Semburan kesuksesan yang tak ada habisnya menjadikan klub ini sebagai klub dengan penghargaan terbanyak di Eropa. Negara ini dinyatakan sebagai \'raja di atas segala raja\' dan memenangkan edisi pertama Piala Interkontinental (1960) sebagai pelengkapnya.'),
(7, '(1961-1970)', 'Tim sedang melalui periode perubahan. Di Spanyol mereka jauh lebih unggul, memenangkan delapan gelar juara liga, lima di antaranya berturut-turut dan termasuk gelar ganda piala liga. Di luar negeri ia memenangkan Piala Eropa Keenamnya, dengan tim \'yé-yé\'.'),
(8, '(1971-1980)', 'Dekade di mana tim berhasil mempertahankan trofi Liga keenamnya juga ditandai dengan meninggalnya Santiago Bernabéu. Sepak bola berduka pada tanggal 2 Juni 1978 atas kehilangan presiden yang membawa Real Madrid ke puncak. Luis de Carlos menggantikan sahabat dan mentornya. Dia memimpin los blancos selama tujuh tahun. Pada saat itu, ia mampu mewujudkan dan menyebarkan nilai-nilai klub, sehingga mendapatkan pengakuan di seluruh dunia.\r\n'),
(9, '(1981-1990)', 'Tahun 80an didominasi oleh generasi pemain tim muda yang brilian. ‘Vulture’s Cohort’ yang dipimpin oleh Emilio Butragueño telah menjadikan Real Madrid salah satu tim terbaik dalam sejarah. Gol Hugo Sánchez juga memainkan peranan penting dalam dekade sukses ini. Los blancos memenangkan dua Piala UEFA pertama dengan beberapa comeback bersejarah di Eropa dan malam-malam ajaib di Bernabéu.'),
(10, '(1991-2000)', 'Jorge Valdano, Fabio Capello dan Vicente del Bosque adalah nama-nama yang patut dikenang pada dekade ini. Tiga pelatih sukses membawa Real Madrid menjadi yang teratas di La Liga dan Eropa dan mereka dibantu oleh beberapa superstar. Pemain seperti Redondo, Laudrup, Seedorf, Suker, Mijatovic dan Roberto Carlos semuanya tiba di klub pada tahun 90an.'),
(11, '(2001-2010)', 'Dalam dekade ini Real Madrid dengan bangga kembali meraih kejayaan di benua ini, dengan memenangkan Piala Eropanya yang Kesembilan dan Piala Interkontinentalnya yang ketiga serta lima Liga, dan gelar-gelar lainnya. Florentino Pérez juga melakukan reorganisasi perekonomian klub untuk menjadikannya klub terkaya di dunia.'),
(12, '(2011-2021)', 'Real Madrid sekali lagi telah mendefinisikan era sepakbola dunia, dengan memenangkan empat Piala Eropa dan empat Piala Dunia Antarklub. Pada tahun 2014, mereka mengangkat La Décima, sebelum memenangkan Piala Dunia Antarklub pada tahun yang sama. Dua musim pertama Zidane sebagai pelatih sangatlah bersejarah, dengan meraih La Undécima dan La Duodécima. Terlebih lagi, tahun 2017 menjadi tahun yang memecahkan rekor ketika tim berhasil meraih lima trofi: Piala Eropa, Piala Dunia Antarklub, Liga, dan Piala Super Eropa dan Spanyol. La Decimotercera kemudian datang pada tahun 2018, ketika mereka menang melawan Liverpool di Kiev.'),
(13, '(2021-Now)', 'Pada tahun 2024, Real Madrid menorehkan babak baru dalam sejarah sepak bola dengan menjuarai Piala Eropa untuk yang ke-15 kalinya. Tim kami memperkuat dominasinya dalam kompetisi melawan Borussia Dortmund di London. Sebelumnya, klub telah merayakan tonggak sejarah lainnya di tahun 2022 dengan menjuarai Piala Eropa untuk ke-14 kalinya, di Paris melawan Liverpool. Awal dekade ini juga ditandai dengan gelar Liga yang ke-35 dan ke-36, Piala Super Eropa yang kelima dan keenam, Piala Dunia Antarklub yang kedelapan, Piala Raja yang ke-20 dan dua Piala Super Spanyol lainnya.');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id_session` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`) VALUES
(101, 'd', 'd@d.com', '$2y$10$g68Z6nqAUJOD.74tZrPBGOBjyEPDAZt4.yQlAGHuCY8iJjftj4dWG', NULL),
(102, 'admin', 'admin@admin.com', '$2y$10$tryTHnJ4kMD77PZO0EIvuuAy5gjOX8i5q/l.XPcecpXbaG/LCVD0.', 'manager'),
(103, 'otto', 'otto@otto.com', '$2y$10$b9PsHO9mtG0KQ/fX95Sk6eRCBsAet8STqzNe6J861pf79HW6zxniK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id_sejarah`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id_sejarah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `fk_manager_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pemain`
--
ALTER TABLE `pemain`
  ADD CONSTRAINT `pemain_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
