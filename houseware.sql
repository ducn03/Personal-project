-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2022 lúc 10:12 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `houseware`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `picture` varchar(128) DEFAULT NULL,
  `fullname` varchar(128) NOT NULL,
  `tel` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `picture`, `fullname`, `tel`, `address`, `active`, `role`) VALUES
(1, 'admin@gmail.com', '123', NULL, 'Nguyễn Đình Đức', NULL, '1', 0, 3),
(2, 'dinhducn7@gmail.com', '0909', 'avt2.jpeg', 'Ducdeptrai', '0937655080', '491/5 Lê Văn Sỹ, phường 12, quận 3, thành phố Hồ Chí Minh', 1, 1),
(3, 'dinhducn10@gmail.com', '123', NULL, 'ducpro123', '0909888111', 'DongNai', 1, 1),
(4, 'helloworld@gmail.com', '123', NULL, 'Helloworld', '0909090909', 'DongNai', 1, 2),
(5, 'taocan5@gmail.com', '123', NULL, 'TaoCan5', '0909090999', 'DongNai', 1, 2),
(6, 'tuandao8826848@gmail.com', '123', NULL, 'Đào Công Tuấn', '09090909', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'cooking equipment'),
(2, 'dispensing equipment'),
(3, 'kitchen equipment'),
(4, 'household appliances');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `staff` varchar(128) DEFAULT NULL,
  `reply` varchar(200) DEFAULT NULL,
  `created_DateRep` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'waiting',
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(128) NOT NULL,
  `note` mediumtext DEFAULT NULL,
  `shipping_email` varchar(200) DEFAULT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `payment_term` tinyint(4) NOT NULL,
  `staff_id` varchar(200) DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `member_id`, `date`, `status`, `total_amount`, `shipping_name`, `shipping_mobile`, `phone`, `note`, `shipping_email`, `shipping_address`, `payment_term`, `staff_id`, `delivered_date`, `shipping_fee`, `updated_at`, `created_at`) VALUES
(88, NULL, '2022-09-02 04:03:38', 'confirm', '35339.00', NULL, NULL, '0937655080', 'tới sớm xíu', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, 'Nguyễn Đình Đức', '2022-10-20', NULL, '2022-09-01 21:03:51', '2022-09-01 21:03:51'),
(89, NULL, '2022-09-02 04:05:45', 'waiting', '35339.00', NULL, NULL, '0937655080', 'Tới sớm  chút', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, NULL, NULL, NULL, '2022-09-01 21:05:59', '2022-09-01 21:05:59'),
(90, NULL, '2022-09-02 04:07:52', 'waiting', '35339.00', NULL, NULL, '0937655080', 'tới sớm chút', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, NULL, NULL, NULL, '2022-09-01 21:08:03', '2022-09-01 21:08:03'),
(93, 2, '2022-10-24 14:24:41', 'waiting', '689.00', NULL, NULL, '0937655080', '=)))))', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, NULL, NULL, NULL, '2022-10-24 07:24:52', '2022-10-24 07:24:52'),
(94, 2, '2022-10-24 14:49:48', 'waiting', '339.00', NULL, NULL, '0937655080', '...', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, NULL, NULL, NULL, '2022-10-24 07:50:02', '2022-10-24 07:50:02'),
(95, 2, '2022-10-24 22:09:25', 'waiting', '14.00', NULL, NULL, '0937655080', 'ohhh', 'dinhducn7@gmail.com', '491/5 Lê Văn Sỹ phường 12 quận 3 tp HCM', 0, NULL, NULL, NULL, '2022-10-24 15:09:36', '2022-10-24 15:09:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `qty`, `price`, `amt`, `updated_at`, `created_at`) VALUES
(96, 88, 4, 100, 350, 35000, '2022-09-01 21:03:51', '2022-09-01 21:03:51'),
(97, 88, 5, 1, 339, 339, '2022-09-01 21:03:51', '2022-09-01 21:03:51'),
(98, 89, 4, 100, 350, 35000, '2022-09-01 21:05:59', '2022-09-01 21:05:59'),
(99, 89, 5, 1, 339, 339, '2022-09-01 21:05:59', '2022-09-01 21:05:59'),
(100, 90, 4, 100, 350, 35000, '2022-09-01 21:08:03', '2022-09-01 21:08:03'),
(101, 90, 5, 1, 339, 339, '2022-09-01 21:08:03', '2022-09-01 21:08:03'),
(107, 93, 4, 1, 350, 350, '2022-10-24 07:24:52', '2022-10-24 07:24:52'),
(108, 93, 5, 1, 339, 339, '2022-10-24 07:24:52', '2022-10-24 07:24:52'),
(109, 94, 5, 1, 339, 339, '2022-10-24 07:50:02', '2022-10-24 07:50:02'),
(110, 95, 6, 1, 14, 14, '2022-10-24 15:09:36', '2022-10-24 15:09:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image_1` varchar(128) DEFAULT NULL,
  `image_2` varchar(128) DEFAULT NULL,
  `image_3` varchar(128) DEFAULT NULL,
  `image_4` varchar(128) DEFAULT NULL,
  `image_5` varchar(128) DEFAULT NULL,
  `inventory_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `inventory_qty`) VALUES
(4, 'HAUTEVILLE ROCKING CHAIR', '350.00', '<h2>Hauteville Rocking Chair</h2>\r\n									<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>\r\n\r\n									<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>\r\n\r\n									<div class=\"row\">\r\n										<div class=\"col-md-6\">\r\n											<h2 class=\"uppercase\">Keep it simple</h2>\r\n											<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>\r\n										</div>\r\n										<div class=\"col-md-6\">\r\n											<h2 class=\"uppercase\">Less is more</h2>\r\n											<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>\r\n										</div>\r\n									</div>', 4, 'product-ghe-1.jpg', 'product-ghe-2.jpg', 'product-ghe-3.jpg', 'product-ghe-4.jpg', 'product-ghe-5.jpg', 100),
(5, 'PAVILION SPEAKER', '339.00', '<p>When you mix up design and top sound quality you´ll get something like the <span style=\"color:red\">Pavilion Speaker</span>, an item that blends architectural elements and design features with top-notch tech specs. The Pavilion Speaker features a high-density concrete base to get a proper look and weight stability, and we dare say it helps keeping it away from the mainstreamed plastic speakers. The special metal spiral gives it a crazy coil look made from high grade copper, that´s not just there for the visual side of things, it boosts powerful yet smooth low frequencies to your ears; the high end audio drivers built by Tymphany are there to provide the crisp sharp sound 20W will allow. It features a capacitive touch surface to control them and Bluetooth connectivity to a streaming device. An exquisite blend of materials such as wood, metal and concrete enriched by sound you wouldn’t think possible in speakers of this size. watch the video below.</p>', 4, 'pavilion-speaker-1.jpg', 'pavilion-speaker-2.jpg', 'pavilion-speaker-3.jpg', 'pavilion-speaker-4.jpg', 'pavilion-speaker-5.jpg', 100),
(6, 'LIGOMANCER', '14.00', '<h3>DESCRIPTION</h3>\r\n<p>\r\n\"Ligomancer sofa shows what is normally hidden. More than one hundred meters of the elastic band, the type commonly used for the internal structure of cushioned furniture, is wrapped and woven around a fine tubular frame. The result is a conceptual artwork inviting us to experience a new dimension of relaxation.\" Sofa with metal structure in black chrome finishing. Seat made of black elastic webbing. Variation Details: Sofa with metal structure in glossy copper or black chrome finishing. Seat made of black elastic webbing.\r\n</p>', 4, 'ctrlzak-ligomaner-architonic-jcpligomancer1-01.jpg', 'ctrlzak-ligomaner-architonic-jcpligomancer2-02.jpg', 'ctrlzak-ligomaner-architonic-jcpligomancerdetail1-03.jpg', 'ctrlzak-ligomaner-architonic-jcpligomancerdetail2-04.jpg', 'ctrlzak-ligomaner-architonic-jcpligomancerdetail3-05.jpg', 100),
(7, 'ALATO CABINET', '700.00', '<p>Beginning as both of us interested in craftsmanship works and need to use the invention of the woodwork to be the point of this project. We choose the feathers to be as our inspiration for design because we saw the configuration that we can use it for design, even form, layers, shading and also the colorful.</p>\r\n<p>\r\nMaterial: Solid ash, Ash veneer, MDF board, Metal\r\nFinishing: Spray paint, Powder coat</p>', 4, 'Alato-Cabinet-by-Jumphol-Socharoentham-Pakawat-Vijaykadga.jpg', 'Alato-Cabinet-by-Jumphol-Socharoentham-Pakawat-Vijaykadga-02.jpg', 'Alato-Cabinet-by-Jumphol-Socharoentham-Pakawat-Vijaykadga-03.jpg', 'Alato-Cabinet-by-Jumphol-Socharoentham-Pakawat-Vijaykadga-04.jpg', 'Alato-Cabinet-by-Jumphol-Socharoentham-Pakawat-Vijaykadga-05.jpg', 100),
(8, 'Thomas Coffee Table', '305.00', '<h2>Product information</h2>\r\n<p>\r\n<ul>\r\n<li>Top Material: Manufactured Wood</li>\r\n<li>Base Material: Solid Wood</li>\r\n<li>Overall: 47\'\' L x 43.5\'\' D</li>\r\n<li>Level of Assembly: Full Assembly Needed</li>\r\n<li>Number of Tables Included: 1</li>\r\n</ul>\r\n</p>\r\n<p>\r\nSpace age surfaces. With a starburst-patterned tabletop and boomerang-shaped legs, this coffee table draws its inspiration from dynamic mid-century design. It’s built with kiln-dried solid wood, in an understated finish that complements remotes, plants, and cartons of takeout.</p>', 4, 'Thomas-Coffee-Table-_1_.jpg', 'Thomas-Coffee-Table-_2_.jpg', 'Thomas-Coffee-Table-_3_.jpg', 'Thomas-Coffee-Table-_4_.jpg', 'Thomas-Coffee-Table-_5_.jpg', 100),
(9, 'WW Armchair CS3', '700.00', '<p>Based on a modern Windsor design, the WW armchair, where the first \'W\' stands for Windsor and the second for Wire is an iconic piece of furniture. Produced from solid oak with the unique \'wire\' backrest formed from mild steel rods which are delicately bent and secured beneath the seat, suggesting suspended cord and adding a lightness to what is a very robust piece of furniture. With an extended Colour Series adding even further to the uniqueness of this chair, WW is a true beauty.</p>\r\n\r\n<p>\r\n<b>Design Collaboration</b> - The WW Chair Colour Series has been created in collaboration with the Brighton-based branding agency Studio Makgill. The WW Colour Series is available in a selection of six colourways, available here.\r\n</p>\r\n<p>\r\n<b>Material</b> - Solid oak, powder coated 6mm mild steel rods</p>\r\n<p>\r\n<b>Finish</b> - Back rail natural oak, Wire Red RAL 3028, Seat deep blue RAL 5008, Legs light blue RAL 6027\r\n</p>\r\n<p>\r\n<b>Dimensions</b> - H78cm x D52cm x W55cm\r\n</p>\r\n<p>\r\n<b>Seat Height</b> - 45cm\r\n</p>\r\n<p>\r\n<b>Environmental criteria</b> - FSC or Equivalent, Low VOC/ Greenguard, ISO 9001, Raw Materials sourced in same/ neighbouring country, Cradle to Cradle/ Design for Disassembly, Quality Policy, Recycleable content over 50%, Renewable energy used in factory.</p>', 4, 'LifestyleWW11_1800x1012_7e508a98-db3f-422d-b7e1-09e3f21119f1_1000x.jpg', 'WWArmchairCS301-01_1000x.jpg', 'WWArmchairCS302-01_1000x.jpg', 'WWArmchairCS304-01_1000x.jpg', 'WWArmchairCS305-01_1000x.jpg', 100),
(10, 'HIMITSU MONEY BOX', '55.00', 'Himitsu is designed by <span style=\"color:red;\">Quentin de Coster</span> for the new home collection launched by <span style=\"color:red;\">Vervloet</span>, a Belgian company producing high-end and unique handcrafted brass and bronze items since 1905. The design studio has a passion for “shapes that are sober, logic and expressive; materials that are respected in their physical and tactile qualities; functions that are unexpected and ingenious”, and Himitsu exemplifies this beautifully. The simple yet striking shape is inspired by the polygonal accents found in some coin designs, and the silhouette is further enhanced by the metal material and gleaming finish. The name means “secret” in Japanese, and this money box is created as a classic secret box, requiring a unique accessory to open it. The owner will need a coin that will fit perfectly inside the slot on the lid, as this is the only way to unscrew the top of the box. This clever detail links the object and its function while also adding a playful accent to the design. Expertly handmade using quality materials and traditional craftsmanship, the money box is available in three colors: pink gold, yellow gold, and nickel plated brass. Images courtesy of Quentin de Coster.', 4, 'himitsu-money-box-3.jpg', 'himitsu-money-box-4.jpg', 'himitsu-money-box-8.jpg', 'himitsu-money-box-11.jpg', 'himitsu-money-box-14.jpg', 100),
(11, 'ARIANE PRIN', '99.00', 'The Rust collection made by French-born artist Ariane Prin intrigues at first sight and you need to go beyond the first few moments of appreciation of the organic aesthetic to realize why the simple pieces hold so much power in their minimalist design. They are reminiscent of ancient pots and bowls found among buried temples and centuries-old settlements, yet at the same time they have a refined look and a distinct contemporary feel.\r\nExperimental homeware at its finest, the Rust range takes the allure of handmade products and blends it with artistic sensibility and a keen eye for great design. The result is simply beautiful. Vases, trays, pots, bowls, and boxes share the same main features and color palettes yet no two items are alike. Each product is handmade using a unique mold and a combination of reclaimed metal dust, plaster and resin. As the metal oxidizes, the finished surface boasts various colors and textures, so you can find cream, caramel, russet, and chestnut tones, as well as white, light gray and darker ash. The objects are sanded by hand to achieve perfectly smooth edges and surfaces. Lines, specks, clouds, and dunes of sand appear on the plaster material, creating one-of-a-kind works of art. Living in London, Ariane Prin has graduated from the Royal College of Art in 2011 and has exhibited since 2004, including at the prestigious Victoria and Albert Museum and at the Cité de la Mode et du Design in Paris. You can learn more about the manufacturing process or make an inquiry about the products and prices on the artist’s website. Images courtesy of Ariane Prin.', 4, 'ariane-prin-gessato-1.jpg', 'ariane-prin-gessato-3.jpg', 'ariane-prin-gessato-7a.jpg', 'ariane-prin-gessato-9.jpg', 'ariane-prin-gessato-10.jpg', 100),
(12, 'Bosch HBG675BB1 Series 8 Oven – Built-in', '1257.00', '<p>\r\n<ul>\r\n<li>Built-in oven: achieve perfect baking and roasting results</li>\r\n<li>AutoPilot 10: every dish works perfectly thanks to 10 preset automatic programs</li>\r\n<li>4D hot air: perfect results thanks to optimal heat distribution – regardless of level</li>\r\n<li>Operation with TFT display: Easy operation thanks to operating ring with simple text and symbols</li>\r\n<li>ColorGlass: a great alternative to stainless steel thanks to a black glass front panel</li>\r\n<li>Temperature control from 30°C – 300°C</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 24 Months</li>\r\n</ul>\r\n</p>', 1, 'Lò Nướng Bosch HBG675BB1 Series 8 – Âm Tủ-1.jpg', 'Lò Nướng Bosch HBG675BB1 Series 8 – Âm Tủ-2.jpg', 'Lò Nướng Bosch HBG675BB1 Series 8 – Âm Tủ-3.jpg', 'Lò Nướng Bosch HBG675BB1 Series 8 – Âm Tủ-4.jpg', 'Lò Nướng Bosch HBG675BB1 Series 8 – Âm Tủ-5.jpg', 100),
(13, 'Caso To 20 SilverStyle Oven 2976', '260.00', '<p>\r\n<ul>\r\n<li>Cool-Touch outer shell for optimal insulation.</li>\r\n<li>High quality non-stick coating is easy to clean</li>\r\n<li>Good insulation thanks to the double-glazed oven door</li>\r\n<li>5 diverse baking functions</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 4, 'Lo-Vi-Song-Caso-To-20-SilverStyle-2976-600x600.jpg', 'Lo-Vi-Song-Caso-To-20-SilverStyle-2976-6-1-300x300.jpg', 'Lo-Vi-Song-Caso-To-20-SilverStyle-2976.-1-1-600x600.jpg', 'Lo-Vi-Song-Caso-To-20-SilverStyle-2976-5-600x600.jpg', 'Lo-Vi-Song-Caso-To-20-SilverStyle-2976-4-600x600.jpg', 100),
(14, 'Unold Multi-Purpose Hot Pot Cooker 58546', '113.00', '<p>\r\n<ul>\r\n<li>Automatically turns off after 2 hours of operation</li>\r\n<li>7 temperature levels from 85°C to 330°C</li>\r\n<li>Overheat protection, anti-slip</li>\r\n<li>Power: 1900W</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 1, 'Unold-58546-10-600x600.jpg', 'Unold-58546-11-600x600.jpg', 'Unold-58546-12-600x600.jpg', 'Unold-58546-13-600x600.jpg', 'Unold-58546-15-600x600.jpg', 100),
(15, 'WMF Lono Tischgrill Flach & Gerippt . Electric Grill', '156.00', '<p>\r\n<ul>\r\n<li>Material: High quality Cromargan</li>\r\n<li>Non-stick baking tray made of cast iron</li>\r\n<li>Adjust the baking temperature</li>\r\n<li>Easily removable baking tray for cleaning</li>\r\n</ul>\r\n</p>', 1, 'Bep-Nuong-Dien-WMF-Lono-Tischgrill-Flach-Gerippt-600x600.jpg', 'Bep-Nuong-Dien-WMF-Lono-Tischgrill-Flach-Gerippt-3-600x600.jpg', 'Bep-Nuong-Dien-WMF-Lono-Tischgrill-Flach-Gerippt-1-600x600.jpg', 'Bep-Nuong-Dien-WMF-Lono-Tischgrill-Flach-Gerippt-2-600x600.jpg', 'Bep-Nuong-Dien-WMF-Lono-Tischgrill-Flach-Gerippt-4-600x600.jpg', 100),
(16, 'Unold Automatic Bread Making Machine 68415', '235.00', '<p>\r\n<ul>\r\n<li>11 saved programs + 1 self-installed program</li>\r\n<li>Time selection button, can be preset up to 13 hours.</li>\r\n<li>Pause function (interrupts the program to add ingredients).</li>\r\n<li>The browning level and bread size can be selected.</li>\r\n<li>Bread weight is about 750g - 1,200g.</li>\r\n<li>LCD display screen. Touch keyboard.</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 1, 'May-Lam-Banh-Mi-Unold-_68415-801-600x600.jpg', 'May-Lam-Banh-Mi-Unold-_68415-807-600x600.jpg', 'May-Lam-Banh-Mi-Unold-_68415-802-600x600.jpg', 'May-Lam-Banh-Mi-Unold-_68415-803-600x600.jpg', 'May-Lam-Banh-Mi-Unold-_68415-804-600x600.jpg', 100),
(17, 'Delonghi Icona Vintage Toaster CTOV 2103.BG Beige', '143.00', '<h2>Máy Nướng Bánh Mì Delonghi Icona Vintage CTOV 2103.BG Màu Be</h2>\r\n<p>\r\nDeLonghi là thương hiệu toàn cầu cung cấp cho người tiêu dùng những sản phẩm gia dụng sáng tạo với sự kết hợp độc đáo giữa phong cách và tính năng hiện đại.</p>\r\n<p>\r\nMáy Nướng Bánh Mỳ DeLonghi CTOV2103.BG là công cụ không thể thiếu trong mỗi căn bếp bởi nhờ có thiết bị này mà bạn tiết kiệm được rất nhiều thời gian nướng bánh mì, đặc biệt khi muốn làm bữa sáng ăn nhanh cho cả gia đình. Với dòng máy này bạn chỉ cần 1 phút là đã có ngay những lát bánh mì nóng giòn cho bữa sáng, không còn ngắc ngoải vì phần vỏ bánh mềm oặt, dai, khó nhai nữa. Không chỉ thế đâu, sản phẩm này còn thừa hưởng hàng loạt công nghệ “sịn xò” đến từ thương hiệu nổi tiếng Delonghi nữa đó, cùng Minh House khám phá qua bài viết sau đây.</p>\r\n\r\n<h2>Thiết Kế Tinh Tế, Dễ Sử Dụng</h2>\r\n<p>\r\nMáy Nướng Bánh Mì Delonghi Icona Vintage CTOV 2103.BG Màu Be tối ưu nhất có thể để thuận tiện cho người dùng nên có kích thước vô cùng nhỏ gọn, gần như không chiếm nhiều diện tích trong căn bếp.</p>\r\n<p>\r\nBạn có thể đặt ngay trên bàn ăn, trên bàn bếp đều vô cùng tiện lợi. Hơn cả là máy có thiết kế sang trọng, hiện đại tạo nên nét tinh tế cho không gian nhà bạn. Rất nhiều người dùng cũng vì lý do này mà lựa chọn Máy Nướng Bánh Mì Delonghi Icona Vintage CTOV 2103.BG thay vì các dòng sản phẩm khác, vỏ ngoài màu ánh kim mạ crom sáng bóng chắc chắn thu hút bất kỳ ai, đồng thời rất dễ lau chùi.\r\n</p>\r\n<p>\r\nMáy này được làm chủ yếu từ thép không gỉ cao cấp nên có độ bền bỉ tốt, chịu nhiệt tốt, không dễ bị móp méo khi va đập, ố màu sau thời gian. Hơn nữa kể cả khi bạn sử dụng máy liên tục cũng không lo nóng máy, các linh kiện bên trong có tuổi thọ cao và vận hành ổn định.</p>', 1, '1-9-600x600.jpg', '2-8-600x600.jpg', '3-9-600x600.jpg', '4-9-600x600.jpg', '5-9-600x610.jpg', 100),
(18, 'Caso AF400 Oil Free Fryer – Imported Germany & EU', '217.00', '<h2>Caso Air Fryer AF400</h2>\r\n<p>\r\nProducts are imported from Germany & EU, with highly appreciated intelligent functions, the price compared to other segments is very suitable and cheaper. The Caso AF400 oil-free fryer is considered as one of the golden friends of housewives, because the price is quite affordable compared to high-end products, the beautiful design makes the kitchen more attractive. The food it offers is amazing. Satisfying a lot of difficult customers</p>', 1, 'Noi-chien-khong-dau-Caso-AF400-2.jpg', 'caso-kuechengeraete-heissluftfritteuse-af-400-03177-002-w1400-center-600x400.jpg', 'caso-kuechengeraete-heissluftfritteuse-af-400-03177-003-w1400-center-600x400.jpg', 'caso-kuechengeraete-heissluftfritteuse-af-400-03177-004-w1400-center-600x400.jpg', 'caso-kuechengeraete-heissluftfritteuse-af-400-03177-006-w1400-center-600x400.jpg', 100),
(19, 'Medion Oil Free Fryer MD17769', '118.00', '<p>\r\n<ul>\r\n<li>Using hot air technology</li>\r\n<li>The non-stick coating is strong so you can clean it easily</li>\r\n<li>Timer and temperature control knob up to 200 °C</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 1, '50056560_PIC-H_Dright-2-600x600.jpg', '50056560_PIC-H_Dfront-1-600x600.jpg', '50056560_PIC-H_Dright-top-3-600x600.jpg', '50056560_PIC-H_Dtop-4-600x600.jpg', 'MD17769-2-600x600.jpg', 100),
(20, 'WMF Compact Cuisine Pot Set 20, 4 Pieces', '242.00', '<p>\r\nĐược làm từ thép không gỉ Cromagan 18/10, chống xước, luôn sáng bóng, không bị bào mòn và oxi hóa, đặc biệt an toàn tuyệt đối với sức khỏe người tiêu dùng theo tiêu chuẩn Châu Âu.</p>\r\n<p>\r\nThiết kế vô cùng rộng rãi, các lỗ hấp phân bố đều khắp bề mặt, giúp món ăn chín đều hơn, nhanh hơn, bảo toàn được lượng vitamin, dưỡng chất có trong thực phẩm.</p>\r\n<p>\r\nNắp kính cường lực sang trọng, sạch sẽ, dễ dàng quan sát đồ ăn khi đang nấu, dễ dàng vệ sinh, an toàn với máy rửa chén.</p>\r\n<p>\r\nHấp 1 lúc nhiều loại đồ ăn mà vẫn giữ trọn hương vị.</p>\r\n<p>\r\nSử dụng được với mọi loại bếp</p>\r\n<p>\r\nXửng hấp rất tiện lợi, chế biến nhiều món hấp như xôi, gà, cá, rau củ… rất ngon, không bị mất vitamin và giữ nguyên hương vị của thực phẩm </p>\r\n<p>\r\nXửng có thể đựng được trong nồi hoặc chảo xào từ size 24-26-28. Có xửng này việc hấp tôm, cá, rau củ riêng hoặc dùng nấu lẩu rất tuyệt vời và trở nên đơn giản. Xửng có lòng sâu, vành rộng nên thuận tiện khi nhấc ra khỏi nồi. Hơn nữa còn có nắp đậy vồng cao hấp được nhiều thức ăn hơn.</p>', 1, 'SET-3-NOI-VA-XUNG-HAP-WMF-CUISINE.jpg', '8cc8f138855252a1f97dc30e5dd2fc7e-600x600.jpg', 'noi-hap-1-e1566451843330-600x600.jpg', NULL, NULL, 100),
(21, 'Tefal CY754830 Multi-Purpose Electric Pressure Cooker', '221.00', '<p>\r\n<ul>\r\n<li>Cook easier, more delicious with 10 automatic cooking programs.</li>\r\n<li>Cook up to 3 times faster than gas or electric stoves and traditional cookware.</li>\r\n<li>Large capacity up to 5L with high-quality non-stick coating helps to cook more delicious dishes.</li>\r\n<li>Intuitive, easy-to-operate LED control panel combined with a modern electro-mechanical system.</li>\r\n<li>Exclusive Tefal design with spherical inner pot for better cooking efficiency.</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 1, 'Noi-Ap-Suat-Da-Nang-Tefal-Turbo-Cuisine-CY754-2-600x600.jpg', 'Noi-Ap-Suat-Da-Nang-Tefal-Turbo-Cuisine-CY754-1-600x600.jpg', 'Noi-Ap-Suat-Da-Nang-Tefal-Turbo-Cuisine-CY754-3-600x600.jpg', 'Noi-Ap-Suat-Da-Nang-Tefal-Turbo-Cuisine-CY754-4-600x600.jpg', 'Noi-Ap-Suat-Da-Nang-Tefal-Turbo-Cuisine-CY754-5-600x600.jpg', 100),
(22, 'Dedicated Sous Vide Slow Cooker Machine SWID For Restaurants, Hotels', '824.00', '<h2>Dedicated Sous Vide Slow Cooker Machine SWID For Restaurants, Hotels – Imported Germany & EU</h2>\r\n<p>\r\nSous vide is a fairly new technique in Vietnam that uses food bags that are vacuumed, then dipped into a basin of hot water that is set at a specific constant temperature using a device called a machine. slow cooking.</p>\r\n<p>\r\nThis method is increasingly interested and favored by chefs and housewives with outstanding accuracy, ensuring food is cooked in the most perfect way.</p>\r\n<p>\r\nToday, Minh House will introduce to customers a product of the most powerful and modern sous vide slow cooker on the market, which is the SWID Dedicated Sous Vide Slow Cooker for Restaurants and Hotels.</p>', 1, 'May-Nau-Cham-Sous-Vide-Chuyen-Dung-SWID-Cho-Nha-Hang-Khach-San-600x600.jpg', 'May-Nau-Cham-Sous-Vide-Chuyen-Dung-SWID-Cho-Nha-Hang-Khach-San-1-e1660030064874-600x397.jpg', 'May-Nau-Cham-Sous-Vide-Chuyen-Dung-SWID-Cho-Nha-Hang-Khach-San-2-e1660030083836-600x457.jpg', NULL, NULL, 100),
(23, 'Unold Ice Cream Machine 48895', '355.00', '<p>\r\n<ul>\r\n<li>Digital timer adjustable between 5 and 60 minutes</li>\r\n<li>Removable anodized ice cream container, easy to clean</li>\r\n<li>Fully automatic, self-cooling compressor for continuous cooling</li>\r\n<li>Elegant, durable, strong and patterned stainless steel case</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 2, '71X2E3z1o5L.1000x1000-1-600x600.jpg', '1569958-600x540.jpg', 'may-lam-kem-Unold-48895-descr-03-1-300x300.jpg', 'may-lam-kem-Unold-48895-descr-02-1-300x300.jpg', 'may-lam-kem-Unold-48895-descr-01-1-600x375.jpg', 100),
(24, 'Delonghi Coffee Machine ESAM 420.40.B PERFECTA EVO', '954.00', '<p>\r\n<ul>\r\n<li>Smooth milk foam coffee machine</li>\r\n<li>Diverse functions, flexible coffee options</li>\r\n<li>Easy control with intuitive LCD display and OneTouch controller</li>\r\n<li>Easy to clean</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 2, 'May-Pha-Ca-Phe-DeLonghi-ESAM-420-600x600.jpg', 'May-Pha-Ca-Phe-DeLonghi-ESAM-420-1-600x600.jpg', 'May-Pha-Ca-Phe-DeLonghi-ESAM-420-2-600x600.jpg', 'May-Pha-Ca-Phe-DeLonghi-ESAM-420-3-e1652844349768-600x896.jpg', 'May-Pha-Ca-Phe-DeLonghi-ESAM-420-5-600x600.jpg', 100),
(25, 'De\'Longhi Magnifica S ECAM 22.110B . Coffee Machine', '585.00', '<p>The DeLonghi S ECAM 22.110B Coffee Machine is compact and lightweight, just push a button and turn the knob to customize your own favorite way to brew. Equipped with a manual cappuccino machine that is suitable for creating a rich frothed cappuccino. Help you create many delicious cups of coffee every day for you, for your family.</p>\r\n<p>\r\nThe DeLonghi S ECAM 22.110B Coffee Machine is the most compact automatic coffee machine of the Delonghi brand, but that does not mean that the machine loses the necessary features as well as the quality of espresso according to Italian standards. Cleaning, as well as operation, is extremely easy with user-friendly buttons that can be programmed for different amounts of coffee to suit different customer preferences.</p>', 2, '1-2-600x600.jpg', '2-2-600x600.jpg', '3-2-600x600.jpg', '4-2-600x600.jpg', '9-600x600.jpg', 100),
(26, 'Smeg SJF01BLEU Black Slow Juicer', '624.00', '<h2>Smeg SJF01BLEU Black Slow Juicer</h2>\r\n<p>\r\nA slow juicer (juicing machine) is a device that uses a screw deceleration motor to operate. Squeeze vegetables and fruits slowly, limiting the heat released when operating. Make sure the juice is finished keeping the nutrients intact. And of course, if you can use a quality machine, we will be completely assured when using it. For Smeg, it is a brand that is not very strange to customers anymore. With Smeg product lines designed in harmony between style and technology. They have been on the market for almost half a decade. The Smeg SJF01BLEU Black Slow Juicer is one of them.</p>', 2, 'SJF01BLEU-600x600.jpg', 'SJF01BLEU_5-600x600.jpg', 'SJF01BLEU_3-600x600.jpg', 'SJF01BLEU_2-600x600.jpg', NULL, 100),
(27, 'Medion MD 19107 . Slow Juicer', '137.00', '<h2>Medium MD 19107 slow juicer with modern design, low noise</h2>\r\n<p>\r\nWith the MEDION MD 19107 slow juicer, you can easily squeeze a glass of fruit and vegetable juice with fullness and keep the nutrients intact. The most outstanding advantage of the Medion slow juicer compared to conventional juicers is that the machine does not make a lot of noise when operating, creating more concentrated, more concentrated juice, without separation of water and especially is more nutrient-preserving.</p>', 2, 'may-ep-cham-medion-MD-19107-03-600x600.jpg', 'may-ep-cham-medion-MD-19107-03-600x600 (1).jpg', 'may-ep-cham-medion-MD-19107-04-600x600.jpg', 'may-ep-cham-medion-MD-19107-05-600x600.jpg', 'may-ep-cham-medion-MD-19107-06-600x600.jpg', 100),
(28, 'Blender SMEG BLF01PGEU Pastel Green', '273.00', '<p>\r\n<ul>\r\n<li>Efficient operation with 3 programs and 4 grinding speeds</li>\r\n<li>Nice retro design</li>\r\n<li>BPA-free Tritan material is safe for users\' health</li>\r\n<li>Smooth, steady operation with anti-slip feet</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 2, 'May-Xay-Sinh-To-SMEG-BLF01PGEU-Pastel-Green-600x600.jpg', 'May-Xay-Sinh-To-SMEG-BLF01PGEU-Pastel-Green-6-600x600.jpg', 'May-Xay-Sinh-To-SMEG-BLF01PGEU-Pastel-Green-4-600x600.jpg', 'May-Xay-Sinh-To-SMEG-BLF01PGEU-Pastel-Green-2-600x600.jpg', 'May-Xay-Sinh-To-SMEG-BLF01PGEU-Pastel-Green-1-600x600.jpg', 100),
(29, 'Smeg Hand Blender HBF02PBEU Pastel Blue', '217.00', '<h2>Smeg Hand Blender HBF02PBEU Pastel Blue</h2>\r\n<p>\r\nThe Smeg HBF02PBEU Hand Blender Set makes it easy to blend ingredients at the touch of a button. Compact yet powerful construction makes chopping, mixing, blending and whisking eggs an easy task, and you\'ll be spoiled for choice in whipping up custards, minced meats, and vegetable soups in no time. from this convenient device.</p>', 2, 'HBF02PBEU_11-600x600.jpg', 'HBF02PBEU_1-600x600.jpg', 'HBF02PBEU_2-600x600.jpg', 'HBF02PBEU_3-600x600.jpg', 'HBF02PBEU_4-600x600.jpg', 100),
(30, 'Caso Barista Crema 1833 . Coffee Grinder', '65.00', '<h2>Caso Barista Crema 1833 . Coffee Grinder</h2>\r\n<p>\r\nThe Caso Barista Crema 1833 Coffee Grinder is a premium, specialized coffee grinder for home needs. The machine gives excellent grinding efficiency without affecting the quality of pure coffee.</p>', 2, '1-4-600x600.jpg', '2-6-600x600.jpg', '3-5-600x600.jpg', '4-5-600x600.jpg', '5-5-600x600.jpg', 100),
(31, 'Caso Ice Maker 3305 IceMaster Comfort', '252.00', '<h2>You can make clean ice at home with the Caso 3305 IceMaster Comfort</h2>\r\n<p>\r\nYou will save a lot of time waiting to have a cool cup of ice when using the Caso 3305 IceMaster Comfort home ice maker – technology from Germany. The mini home ice machine is designed by a high-quality housing with a stainless steel look that quickly becomes an eye-catching piece of equipment that fits in any bar, kitchen or garden. The mini home ice maker is especially compact and can be easily transported. No need to connect water thanks to the built-in water tank with a volume of 1.7L.</p>', 2, 'caso-icemaster-comfort-3305-10-1-600x600.jpg', 'caso-icemaster-comfort-3305-11-1-600x600.jpg', 'caso-icemaster-comfort-3305-12-1-600x600.jpg', 'caso-icemaster-comfort-3305-13-1-600x600.jpg', 'caso-icemaster-comfort-3305-14-1-600x600.jpg', 100),
(32, 'Smeg Orange Juicer CJF01BLEU Black', '180.00', '<p>Powerful 70W motor with built-in sensor makes squeezing easy and effortless.</p>\r\n<p>Tritan plastic cap – is a safe, BPA-free, impact-resistant, easy-to-remove synthetic plastic to protect from dust when the product is not in use. In addition, you can also be used the lid as a fruit and peel bowl.</p>\r\n<p>\r\nThe juicer head made of stainless steel and anti-corrosion components ensure a luxurious look to your family\'s kitchen.</p>\r\n<p>The Smeg orange juicer spout is made of stainless steel to dispense juice directly into a glass or cup. Faucet with raised function to pause flow or prevent dripping, dirty cooking surface\r\nBuy once, use for a long time</p>', 2, 'CJF01BLEU_5-600x600.jpg', 'CJF01BLEU_3-600x600.jpg', 'CJF01BLEU_5-600x600 (1).jpg', 'CJF01BLEU-600x600.jpg', NULL, 100),
(33, 'Bosch Semi Acoustic Dishwasher SMI6ZBS01D Series 6', '1734.00', '<p>\r\n<ul>\r\n<li>Modern and economical Zeolite drying technology</li>\r\n<li>Connecting Home Connect brings many benefits</li>\r\n<li>Flexible basket and rack for easy loading and unloading of laundry</li>\r\n<li>Quiet operation at an ideal noise level of 41dB</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 36 Months</li>\r\n</ul>\r\n</p>', 3, 'May-Rua-Bat-Ban-Am-Bosch-SMI6ZBS01D-Serie-6-600x600.jpg', 'May-Rua-Bat-Ban-Am-Bosch-SMI6ZBS01D-Serie-6-1-e1657354818794-600x307.jpg', 'May-Rua-Bat-Ban-Am-Bosch-SMI6ZBS01D-Serie-6-2-e1657354832325-600x322.jpg', 'May-Rua-Bat-Ban-Am-Bosch-SMI6ZBS01D-Serie-6-3-600x600.jpg', 'May-Rua-Bat-Ban-Am-Bosch-SMI6ZBS01D-Serie-6-4-600x600.jpg', 100),
(34, 'Bosch SMV6ZCX00E Series 6 . Full Sound Dishwasher', '1543.00', '<p>\r\n<ul>\r\n<li>Zeolite drying technology Perfect drying results with less energy consumption</li>\r\n<li>Integrating many modern washing features, providing the best washing results</li>\r\n<li>Smart connectivity through the Home Connect app</li>\r\n<li>DosingAssistant ensures optimal cleaning results by completely dissolving detergent</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 36 Months</li>\r\n</ul>\r\n</p>', 3, 'May-Rua-Bat-Bosch-SMV6ZCX00E-Serie-6-e1655891973802-600x334.jpg', 'May-Rua-Bat-Bosch-SMV6ZCX00E-Serie-6-12-600x600.jpg', 'May-Rua-Bat-Bosch-SMV6ZCX00E-Serie-6-9-600x600.jpg', 'May-Rua-Bat-Bosch-SMV6ZCX00E-Serie-6-6-e1655891942440-600x432.jpg', 'May-Rua-Bat-Bosch-SMV6ZCX00E-Serie-6-5-e1655891909974-600x466.jpg', 100),
(35, 'Bosch DDD97BM60B Series 8 . Kitchen Hood', '3165.00', '<p>\r\n<ul>\r\n<li>EcoDrive Silience: Brushless motor.</li>\r\n<li>Efficient operation and optimal energy saving.</li>\r\n<li>Powerful operation with high power level.</li>\r\n<li>TouchControl TouchControl is intuitive and easy to control.</li>\r\n<li>The device will automatically stop working after 10 minutes</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 24 Months</li>\r\n</ul>\r\n</p>', 3, '1-22-600x600.jpg', '2-42-600x600.jpg', '4-33-600x600.jpg', '3-42-600x600.jpg', '61L5WJpvJhL.1000x1000-600x600.jpg', 100),
(36, 'Miele KMDA 7634 FL . Combined Induction Cooker', '5202.00', '<p>\r\n<ul>\r\n<li>Induction hob with 4 cooking zones is integrated with an exhaust system with an elegant design</li>\r\n<li>Automatically adjust the speed of the hood with Con@ctivity . technology</li>\r\n<li>Intuitive SmartSelect control panel, simple and quick to use</li>\r\n<li>Flexible design allows combination of cooking zones for large cookware</li>\r\n<li>Cook faster with Miele\'s exclusive TwinBooster power control technology</li>\r\n<li>Equipped with 10 layers of high quality stainless steel grease filter, easy to clean</li>\r\n<li>The hood is equipped with an ECO motor that is energy efficient, powerful and quiet.</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 24 Months</li>\r\n</ul>\r\n</p>', 3, 'Bep-Tu-Miele-KMDA-7634-FL-2-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-1-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-3-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-4-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-6-600x600.jpg', 100),
(37, 'Bosch PID775DC1E Series 8 . 3-Zone Induction Cooker', '954.00', '<p>Bếp từ âm 3 vùng nấu Bosch PID775DC1E Series 8 nhập khẩu chính hãng từ châu Âu, trang bị hệ thống bảng điều khiển DirectControl với truy cập trực tiếp lên đến 17 cấp độ nấu ăn. Cảm ứng nhanh chóng, chính xác, dễ dàng để làm sạch và hiệu quả giúp người dùng chọn lựa công suất như ý khi nấu nướng. Bosch PID775DC1E là sự lựa chọn hoàn hảo cho không gian bếp hiện đại.</p>\r\n<p>\r\nBếp từ Bosch PID775DC1E đang là dòng sản phẩm nhập khẩu Tây Ban Nha được ưa chuộng nhất hiện nay tại Việt Nam. Bếp được sản xuất trên dây chuyền công nghệ hiện đại, tiên tiến hàng đầu thế giới. Tất cả các sản phẩm của Bosch đều được kiểm định chất lượng nghiêm ngặt trước khi xuất kho, đảm bảo an toàn tuyệt đối cho quý khách hàng khi sử dụng.</p>', 3, 'Bep-Tu-Miele-KMDA-7634-FL-2-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-1-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-3-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-4-600x600.jpg', 'Bep-Tu-Miele-KMDA-7634-FL-6-600x600.jpg', 100),
(38, 'WMF Kult X Handmixer Edition Egg Beater', '78.00', '<h2>WMF Kult X Handmixer Edition Egg Beater</h2>\r\n<p>\r\nWMF was founded in 1853 in Germany, by 3 people, Daniel Straub and the Schweizer brothers. The beginning of the famous WMF brand was just a metal workshop, but around the 90s of the last century they became the world\'s largest manufacturer of household products and metal products. Their monumental development history makes other brands always take WMF as a standard.</p>\r\n<p>\r\nThe WMF Kult X Handmixer Edition whisk is the right product to help you make a variety of delicious desserts every day. Design makes a technical and visual impression.</p>', 3, '2-19-600x600.jpg', '1-21-600x600.jpg', '3-19-600x600.jpg', '5-12-600x600.jpg', '4-15-600x600.jpg', 100),
(39, 'Siemens Kettle TW86103P Sensor Ceramic Dark 1.5L', '115.00', '<h2>Siemens Kettle TW86103P Sensor Ceramic Dark 1.5L</h2>\r\n<p>\r\nSiemens TW86103P Kettle - Black, with a capacity of 2400W, 1.5 liter capacity, has 4 heat levels 70-80-90-100 to help meet all the needs of the family: making tea, making milk, cereals , food processing, cooking ... and help save electricity to maximize power and use demand.</p>\r\n\r\n<h2>Material Stainless steel, durable</h2>\r\n<p>\r\nProducts made from high-grade stainless steel and plastic are absolutely safe for human health and are censored by leading European units for quality and consumer protection.</p>\r\n\r\n<h2>Minimize the risk of electric shock or fire</h2>\r\n<p>\r\nThe Siemens TW86103P kettle with cord and plug is designed to be extremely sturdy to minimize the risk of electric shock or fire. Automatically shuts off when enough heat or running out of water.</p>', 3, 'am-nuoc.jpg', 'am-nuoc2.jpg', 'am-nuoc3.jpg', 'am-nuoc4.jpg', 'am-nuoc5.jpg', 100),
(40, 'WMF Flötenkessel Induction Kettle 2.0L', '70.00', '<p>\r\n<ul>\r\n<li>Cromargan 18/10 steel material is acid resistant and does not rust</li>\r\n<li>High quality plastic handle with high temperature resistance</li>\r\n<li>Fast heating: heat water in a short time</li>\r\n<li>As soon as the water boils, the kettle attracts attention with a whistling sound</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: No warranty</li>\r\n</ul>\r\n</p>', 3, '813x02mYS2L.1000x1000-600x600.jpg', '71jsHWSHNdS.1000x945-600x567.jpg', '81wmZNV2UaL._AC_SL1500_-300x300.jpg', '71jsHWSHNdS.1000x945-600x567 (1).jpg', '819UdoM-WS._AC_SL1500_-600x614.jpg', 100),
(41, 'Set of 3 Zwilling Messerset Professional Knives', '160.00', '<h2>Set of 3 Zwilling Messerset Professional Knives</h2>\r\n<p>\r\nSet of 3 Thai Knives Zwilling Messerset Professional S with the main function of cutting foods. With 3 main functions in 3 types of knives as above, users can completely slice - filter meats and fish thanks to the 16cm long knife. Or you can also cut vegetables and fruits cleanly, without getting in the way of substances from other knives thanks to the 10cm long paring knife. Or with a larger knife 20cm long, customers can use it to chop, cut or chop other foods without worrying about which knife to use to chop food.</p>', 3, 'dao-thai-1.jpg', 'dao-thai-2.jpg', 'dao-thai-3.jpg', 'dao-thai-4.jpg', 'dao-thai-5.jpg', 100),
(42, 'Set of 3 Joseph Joseph Bamboo Cutting Boards 60141 Index', '104.00', '<h2>Set of 3 Joseph Joseph Bamboo Cutting Boards 60141 Index</h2>\r\n<p>\r\nJoseph Joseph is an award-winning international joseph homewares brand sold in over 100 countries globally.</p>\r\n<p>\r\nJoseph Joseph Housewares includes products such as: knives, scissors, cutting boards, ladles, spoons, kitchen gadgets, kitchen tools, food containers, food, baking tools, trash cans, utensils bathroom tools, toilet brush, brush</p>\r\n<p>\r\nSet of 3 Bamboo Cutting Boards Joseph Joseph 60141 Index is a set of products that are not only convenient for your kitchen but also show the level of luxury and sophistication. As well as showing absolute safety when using.</p>', 3, 'thot-1.jpg', 'thot-2.jpg', 'thot-3.jpg', 'thot-4.jpg', 'thot-5.jpg', 100),
(43, 'Electronic Scales Caso 3267 Kitchen EcoMaster – Imported from Germany & EU', '37.00', '<h2>Electronic Scales Caso 3267 Kitchen EcoMaster</h2>\r\n<p>\r\nElegant and minimalist electronic scale from the German manufacturer CASO DESIGN. Model Kitchen Ecomaster has a universal design, the device is designed for traditional, classic and modern kitchens. The surface of the scale is made of the highest grade stainless steel. The optimized work surface makes it easy to measure the weight of components. Thanks to the very accurate weighing system (with an accuracy of 1 gram), the scale is an indispensable tool in the kitchen. The scale allows you to weigh products up to 5 kg.</p>\r\n<p>\r\nFrom now on, you can forget about the problem of no-load weighing due to the passage of time. As you know, a commonly used scale, equipped with a traditional battery, automatically discharges. The effect of this is that whenever needed it simply doesn\'t work. The Caso 3267 Kitchen EcoMaster Digital Scale is equipped with a special knob that will power the scale whenever you need it. The crown is equipped with Dynamo technology, allowing up to three minutes of weighing.</p>', 3, 'Can-Dien-Tu-Caso-Kitchen-EcoMaster-3267-600x578.jpg', 'Can-Dien-Tu-Caso-Kitchen-EcoMaster-3267-1-600x527.jpg', 'Can-Dien-Tu-Caso-Kitchen-EcoMaster-3267-3-600x511.jpg', 'Can-Dien-Tu-Caso-Kitchen-EcoMaster-3267-04.jpg', NULL, 100),
(44, 'Set of 2 Frying Pans Wmf 07.4114.6290 Size 24+28cm', '100.00', '<h2>Set of 2 Frying Pans Wmf 07.4114.6290 Size 24 + 28cm</h2>\r\n<p>\r\nSet of 2 Wmf Frying Pans made of Cromargan®, durable, beautiful, handle harmful acids in food, easy to clean. With TransTherm® -Allherdboden coating – the WMF frying pan is suitable for all heat sources and also for induction heating.</p>\r\n<p>\r\nThe outside of the WMF pan uses Cromargan steel. (Cromargan® has been a registered trademark of WMF for 18/10 stainless steel since 1927. The alloy is 18% chromium, 10% nickel and 72% steel. Chromium makes the pan rust-proof, nickel helps to resist rust.) acid and gloss). Free of PTFE & PFOA</p>\r\n<p>\r\nThe WMF frying pan is coated with non-stick ceramic based on superior non-stick properties and high temperature resistance (heat resistant up to 400°C), especially safe for health. The ability to catch heat quickly, not easy to oxidize, rust during use, safe for the health of the user.</p>', 3, 'Bo-2-Chao-Chien-Wmf-07.4114.6290-Size-2428cm--600x600.jpg', 'Bo-2-Chao-Chien-Wmf-07.4114.6290-Size-2428cm-1-600x600.jpg', 'Bo-2-Chao-Chien-Wmf-07.4114.6290-Size-2428cm-2-600x600.jpg', 'Bo-2-Chao-Chien-Wmf-07.4114.6290-Size-2428cm-3-600x600.jpg', NULL, 100),
(45, 'WMF Quality One Cooking Pot Set, 4 Pieces', '269.00', '<h2>WMF Quality One Cooking Pot Set, 4 Pieces</h2>\r\n<p>\r\nThe elegant design of the Quality One line comes from Peter Ramminger. With the idea of ​​transforming the harmonious lines and clear shapes of the pots into their great function. Aims to develop products that simplify cooking and improve everyday kitchen life. With the WMF Quality One Cookware Set, 4 Mains is a gift for housewives with its beautiful bulb shape, round handle and curved lid, and outstanding utility. Make sure not to disappoint your expectations.</p>', 3, 'noi-1.jpg', 'noi-2.jpg', 'noi-3.jpg', 'noi-4.jpg', 'noi-5.jpg', 100),
(46, 'Wmf Bistro Wmf Bistro Bowl And Spoon Set 12,8812,9000', '83.00', '<p>\r\n<ul>\r\n<li>Material: porcelain, Cromargan 18/10 polished stainless steel, rustproof, dishwasher safe, dimensionally stable, hygienic, food acid resistant.</li>\r\n<li>Ideal for serving salads, as well as desserts or homemade fruit drinks</li>\r\n<li>Stylish, beautiful design matches other utensils on the dining table</li>\r\n<li>Set includes: 24cm diameter porcelain bowl and 2 30cm long mixing spoons</li>\r\n<li>Origin: Import Germany & EU</li>\r\n</ul>\r\n</p>', 3, 'Bo-Bat-Va-Thia-Salat-Wmf-Bistro-2-600x600.jpg', 'Bo-Bat-Va-Thia-Salat-Wmf-Bistro-1-600x600.jpg', 'Bo-Bat-Va-Thia-Salat-Wmf-Bistro-3-600x600.jpg', NULL, NULL, 100),
(47, 'Set of 5 Joseph Joseph Dry Storage Boxes 81071', '74.00', '<h2>Set of 5 Joseph Joseph Dry Storage Boxes 81071</h2>\r\n<p>\r\nSet of 5 Joseph Joseph 81071 Dry Storage Boxes helps your family\'s kitchen become much neater and more convenient. In particular, if you want to save space for the kitchen and still ensure the convenience of use, this is a product that should not be missed.</p>\r\n<p>\r\nSet of 5 Joseph Joseph 81071 Dry Food Containers helps you to store dry foods in absolute safety. This is one of the products trusted by many housewives thanks to its ability to effectively prevent air from entering. With an affordable price, convenience and variety of uses, this is really an indispensable set in your kitchen.</p>', 3, 'bo-dung-do-kho-1.jpg', 'bo-dung-do-kho-2.jpg', 'nap-dung-do-kho-joseph-podium-81071-600x481.jpg', '91081b4e-3089-4187-8c7a-2537cec9893d._SL300__.jpg', NULL, 100),
(48, 'Set of 5 Joseph Joseph Dry Food Containers 95035 Podium 100', '91.00', '<p>\r\n<ul>\r\n<li>SKU: 95035</li>\r\n<li>Brand: Joseph Joseph</li>\r\n<li>Material: borosilicate glass</li>\r\n<li>General dimensions: 9.9 x 32.6 x 32cm</li>\r\n<li>Set of 5 boxes with different capacity: 1x1.9L + 1x1.2L + 2x900ML + 1x500ML</li>\r\n<li>Genuine import from Germany</li>\r\n</ul>\r\n</p>', 3, 'set-5-hop-dung-thuc-pham-600x600.jpg', 'set-5-hop-dung-thuc-pham-8-600x600.jpg', 'set-5-hop-dung-thuc-pham-6-600x600.jpg', 'set-5-hop-dung-thuc-pham-5-600x600.jpg', 'set-5-hop-dung-thuc-pham-4-600x600.jpg', 100),
(49, 'Unold Steam Fan 86990', '170.00', '<h2>Unold Steam Fan 86990</h2>\r\n<p>\r\nThe latest super product in 2022, Unold 86990 Steam Fan with ultrasonic mist technology, ensures that the air in the room is always fresh and pleasant. The misting function of the Unold 86990 Air Conditioner Fan with Air Filter can be turned on/off separately.</p>\r\n\r\n<h2>Super large water tank</h2>\r\n<p>\r\nWater tank with a volume of 2 liters and water level indicator, which can be inserted and removed easily. Equipped with 2 included Air Cooler Fresh dry ice gels to help the fan cool more deeply, the cooling effect is not inferior to when the air conditioner is turned on.</p>\r\n\r\n<h2>Removable dust filter, easy to clean</h2>\r\n<p>\r\nUnold 86990 Steam Fan is equipped with a filter system, removing 99.95% of dirt, bacteria, viruses, pollen, mold, etc., including 0.3 micron fine dust, deodorizing and harmful gases. such as formaldehyde… The dust filter is removable, easy to clean and replace.</p>\r\n<p>\r\n3 ventilation modes: sleep/normal/natural wind; with 3 different speeds to meet all user needs.</p>', 4, 'quat-hoi-nuoc-1.jpg', 'quat-hoi-nuoc-2.jpg', 'quat-hoi-nuoc-3.jpg', 'quat-hoi-nuoc-4.jpg', 'quat-hoi-nuoc-5.jpg', 100),
(50, 'Dyson TP02 Bladeless Fan with Air Filter', '570.00', '<h2>Dyson TP02 Bladeless Fan with Air Filter</h2>\r\n<p>\r\nThe Dyson TP02 Bladeless Fan with Air Filter is a product with a modern, luxurious and classy design of the Dyson brand. With automatic sensor-controlled cleaning, the 360° HEPA filter with fiberglass and activated carbon layer removes up to 99.97% of airborne allergens, pollen, bacteria, and spores mold, smoke, odors and toxic substances from your pet\'s skin.</p>\r\n\r\n<h2>Jet Focus technology allows air flow to be adjusted according to preference</h2>\r\n<p>\r\nThe Dyson TP02 Bladeless Fan with Air Filter with Jet Focus technology will allow users to adjust the air flow according to their preferences. At the same time, the airflow focus mechanism (Jet Focus) helps to focus on creating strong airflow for distant areas, or the diffuse mode (Diffused Mode) helps the airflow to blow throughout the room.</p>\r\n\r\n<h2>Air Multiplier technology for continuous airflow</h2>\r\n<p>\r\nBladeless Fan with Air Filter Dyson TP02 uses Air Multiplier technology to help air flow continuously, not interrupted like a winged fan, without creating the feeling of being blown, causing discomfort like in a traditional winged fan. . Clean the air in the room in the most effective way. With Air Multiplier technology, it also delivers 290 liters of air per second with a comfortable yet powerful airflow that distributes pure air throughout the room.</p>', 4, 'quat-khong-canh-1.jpg', 'quat-khong-canh-2.jpg', 'quat-khong-canh-3.jpg', 'quat-khong-canh-4.jpg', 'quat-khong-canh-5.jpg', 100),
(51, 'Bosch WAV28E93 HomeProfessional Washing Machine 9kg', '1951.00', '<p>\r\n<ul>\r\n<li>i-DOS automatically measures and precisely dispenses the required amount of water and detergent</li>\r\n<li>Stain Automatic Plus removes stubborn stains without pre-treatment</li>\r\n<li>4D Washing System: Allows water and detergent to penetrate deeply into each fabric for perfect </li>\r\n<li>washing results</li>\r\n<li>Home Connect: Smart networked home appliances that make life easier</li>\r\n<li>Quickly find the ideal wash program with Easy Start</li>\r\n</ul>\r\n</p>', 4, 'May-Giat-Bosch-WAV28E93-HomeProfessional-9kg-3-600x600.jpg', 'May-Giat-Bosch-WAV28E93-HomeProfessional-9kg-600x600.jpg', 'May-Giat-Bosch-WAV28E93-HomeProfessional-9kg-2-e1656298357833-600x270.jpg', 'May-Giat-Bosch-WAV28E93-HomeProfessional-9kg-4-e1656298372376-600x333.jpg', 'May-Giat-Bosch-WAV28E93-HomeProfessional-9kg-1-600x600.jpg', 100),
(52, 'Siemens iQ500 Washer Dryer WD14U512 – Wash 10kg Dry 6kg', '2211.00', '<p>\r\n<ul>\r\n<li>smartFinish reduces wrinkles, saves time without ironing or ironing.</li>\r\n<li>AutoDry technology – gentle, precise and energy-efficient drying.</li>\r\n<li>speedPack XL – Speed ​​up programs or wash and dry in just 60 minutes.</li>\r\n<li>With Home Connect, you can control your washer and dryer from anywhere.</li>\r\n<li>Impregnation/outdoor program protects absorbent textiles.</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 24 months</li>\r\n</ul>\r\n</p>', 4, 'may-giat-1.jpg', 'may-giat-2.jpg', 'mat-giat-3.jpg', 'may-giat-4.jpg', 'may-giat-5.jpg', 100),
(53, 'Side By Side Refrigerator Bosch KAG93AIEP Series 6 – 560 Liters', '5159.00', '<p>\r\n<ul>\r\n<li>Super Large Capacity: Larger storage area.</li>\r\n<li>Take out ice: Get ice cubes, crushed ice, cold water with just one button.</li>\r\n<li>VarioZone: More flexibility due to interchangeable glass shelves and drawers in the freezer.</li>\r\n<li>SuperCool: Fast cooling system for optimal food preservation.</li>\r\n<li>LED lighting: Led lighting and display make it easy to store food.</li>\r\n<li>Home Connect: Control and monitor your home appliances from anywhere.</li>\r\n<li>NoFrost: Anti-frost.</li>\r\n</ul>\r\n</p>', 4, 'Tu-Lanh-Side-By-Side-Bosch-KAG93AIEP-Serie-6-600x600.jpg', 'Tu-Lanh-Side-By-Side-Bosch-KAG93AIEP-Serie-6-1-600x600.jpg', 'Tu-Lanh-Side-By-Side-Bosch-KAG93AIEP-Serie-6-6-1-600x494.jpg', 'Tu-Lanh-Side-By-Side-Bosch-KAG93AIEP-Serie-6-2-600x600.jpg', 'Tu-Lanh-Side-By-Side-Bosch-KAG93AIEP-Serie-6-5-600x600.jpg', 100),
(54, 'Refrigerator Liebherr SBSes 8496 PremiumPlus BioFresh NoFrost', '11271.00', '<p>\r\n<ul>\r\n<li>Food is preserved longer, keeping freshness for a long time with BioFresh-Plus technology.</li>\r\n<li>The NoFrost system provides rapid freezing for safe, long-term food preservation.</li>\r\n<li>DuoCooling system with precise, independent temperature control helps prevent food odors between compartments, food is preserved longer.</li>\r\n<li>Wine storage compartment with a capacity equivalent to 48 0.75L Bordeaux bottles.</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty: 24 Months</li>\r\n</ul>\r\n</p>', 4, 'Tu-Lanh-Liebherr-SBSes-8496-2-600x600.jpg', 'Tu-Lanh-Liebherr-SBSes-8496-1-600x600.jpg', 'Tu-Lanh-Liebherr-SBSes-8496-3-600x600.jpg', 'Tu-Lanh-Liebherr-SBSes-8496-4-600x600.jpg', 'Tu-Lanh-Liebherr-SBSes-8496-8-600x600.jpg', 100),
(55, 'Emsa Flow Classic cooler 515668', '61.00', '<h2>Drinking enough water is easy with the Emsa Flow Classic Cooler 515668</h2>\r\n<p>\r\nEveryone knows the importance of drinking plenty of water every day. Drinking lots of water is good for our skin, internal organs and general health. But does that mean we always have to be content with boring old tap water? No! Thankfully, another option is available as an infusion. In other words: flavored water.</p>\r\n<p>\r\nInfused water is an ingenious way to derive additional benefits from drinking water. It helps many people to gain water balance in the body while also enjoying drinking water. And best of all, it\'s a healthy choice like fruits, herbs, vegetables, and copper. release valuable nutrients into the water – such as minerals, vitamins and antioxidants – and these enter the body as a result.</p>\r\n<p>\r\nIn order to retain the most characteristic flavor, the Emsa Flow Classic 515668 cooler will meet your requirements.</p>', 4, 'binh-giu-lanh-Emsa-Flow-Classic-515668-05-600x600.jpg', 'binh-giu-lanh-Emsa-Flow-Classic-515668-02-600x600.jpg', 'binh-giu-lanh-Emsa-Flow-Classic-515668-01-600x600.jpg', 'binh-giu-lanh-Emsa-Flow-Classic-515668-04-600x599.jpg', 'binh-giu-lanh-Emsa-Flow-Classic-515668-03-600x600.jpg', 100),
(56, 'Philips Steam Iron GC4937/20', '156.00', '<p>\r\n<ul>\r\n<li>Philips exclusive SteamGlide Plus soleplate</li>\r\n<li>Powerful power 3000 W</li>\r\n<li>OptimalTEMP . optimal temperature technology</li>\r\n<li>Origin: Import Germany & EU</li>\r\n<li>Warranty 12 months</li>\r\n</ul>\r\n</p>', 4, 'ban-la-nuoc-1.jpg', 'ban-la-nuoc-2.jpg', 'ban-la-nuoc-3.jpg', 'ban-la-nuoc-4.jpg', 'ban-la-nuoc-5.jpg', 100),
(57, 'Coffee Table With Built-In Refrigerator Caso Sound And Cool 790', '1604.00', '<h2>Coffee Table With Built-In Refrigerator Caso Sound And Cool 790</h2>\r\n<p>\r\nCoffee Table Integrated Refrigerator Caso Sound And Cool 790 is a smart product that integrates many features such as refrigerator, phone charger, desk, can play music ... Suitable for music enthusiasts, lively , or sports such as football, volleyball, tennis ... Make your room more comfortable and luxurious whether it\'s at home or at work.</p>', 4, 'ban-tra-tu-lanh-1.jpg', 'ban-tra-tu-lanh-2.jpg', 'ban-tra-tu-lanh-3.jpg', 'ban-tra-tu-lanh-4.jpg', 'ban-tra-tu-lanh-5.jpg', 100);
INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `inventory_qty`) VALUES
(58, 'Cuckoo Watch 60820000', '234.00', '<h2>CUCKOO WATCH 60820000</h2>\r\n<p>\r\nA clock with a classic style brings a unique and luxurious touch to your room. Very suitable for living room with European design style.</p>\r\n<p>\r\nThe watch is made of solid wood. Exquisite roofing and shingles. Designed and crafted by hand.</p>\r\n<p>\r\nSecond precision battery operated quartz movement – ​​no winding required.</p>\r\n<p>\r\nAutomatically mute the ringer at night through light sensor. Musical movement with 12 different melodies that alternate hourly</p>\r\n<p>\r\nThe waterfall sound is realistic and echoes in the background when the cuckoo calls</p>', 4, 'dong-ho-cuc-cu-1.jpg', 'dong-ho-cuc-cu-2.jpg', NULL, NULL, NULL, 100),
(59, 'Vileda Steam Mop', '182.00', '<p>\r\n<ul>\r\n<li>Technology creates steam at a temperature of 100 degrees Celsius, killing up to 99.99% of bacteria</li>\r\n<li>Clean all types of floors: stone floors, wooden floors, tile floors, ...</li>\r\n<li>The thickness of steam can be freely adjusted</li>\r\n<li>Absorbent wipes clean, clean a large area of ​​​​space</li>\r\n</ul>\r\n</p>', 4, 'lau-nha-hoi-nuoc-1.jpg', 'lau-nha-hoi-nuoc-2.jpg', 'lau-nha-hoi-nuoc-3.jpg', 'lau-nha-hoi-nuoc-4.jpg', 'lau-nha-hoi-nuoc-5.jpg', 100),
(60, 'Leifheit 52101 Twist Ergo Mop', '74.00', '<p>\r\n<ul>\r\n<li>360° universal joint with flat joint for cleaning hard-to-reach places</li>\r\n<li>Length-adjustable handle for back-friendly work</li>\r\n<li>The 6-liter bucket is easy to move and empty</li>\r\n<li>Easy to squeeze, good moisture control</li>\r\n<li>Origin: Import Germany & EU</li>\r\n</ul>\r\n</p>', 4, 'Cay-Lau-Nha-Leifheit-52101-Twist-Ergo-600x600.jpg', 'Cay-Lau-Nha-Leifheit-52101-Twist-Ergo-1-e1653881025291-600x453.jpg', 'Cay-Lau-Nha-Leifheit-52101-Twist-Ergo-2-e1653881040592-600x448.jpg', 'Cay-Lau-Nha-Leifheit-52101-Twist-Ergo-3-e1653881054951-600x442.jpg', 'Cay-Lau-Nha-Leifheit-52101-Twist-Ergo-4-e1653881070755-600x450.jpg', 100),
(61, 'Philips HX6851/34 . Double Electric Brush', '165.00', '<h2>Philips HX6851/34 . Double Electric Brush</h2>\r\n<p>\r\nA gentle cleaning experience for healthy teeth and gums: Philips electric toothbrush HX6851/34 with advanced sonic technology gives you the certainty that effective cleaning can also be gentle. Signals innovative pressure control technology when too much pressure is applied.</p>\r\n<p>\r\nWith the Optimal White brush head, 7 times more plaque is removed than with a manual toothbrush. Choose your personal cleaning program from three different cleaning programs. Thanks to the 2-minute timer, you can keep the cleaning time recommended by dentists for healthy oral hygiene.</p>', 4, 'Ban-Chai-Dien-Doi-Philips-HX6851.34-6-600x600.jpg', 'Ban-Chai-Dien-Doi-Philips-HX6851.34-4-600x600.jpg', 'Ban-Chai-Dien-Philips-HX6807.28-3-600x600.jpg', 'Ban-Chai-Dien-Doi-Philips-HX6851.34-1-600x473.jpg', NULL, 100);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `feedback_ibfk_2` (`account_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ac` (`member_id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_fk` (`order_id`),
  ADD KEY `order_item_fk2` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_ac` FOREIGN KEY (`member_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_fk` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_item_fk2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
