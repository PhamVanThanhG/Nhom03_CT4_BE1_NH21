-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 07:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookfoodstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `arrimg`
--

CREATE TABLE `arrimg` (
  `id_product` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arrimg`
--

INSERT INTO `arrimg` (`id_product`, `image`) VALUES
(1, 'burger1.jpg,burger11.jpg,burger111.jpg'),
(2, 'burger2.jpg,burger21.jpg,burger22.jpg'),
(3, 'burger3.jpg,burger31.jpg,burger32.jpg'),
(4, 'burger4.jpg,burger1.jpg,burger11.jpg'),
(5, 'burger5.jpg,burger1.jpg,burger11.jpg'),
(6, 'burger6.jpg,,burger1.jpg,burger11.jpg'),
(7, 'burger7.jpg,burger1.jpg,burger11.jpg'),
(8, 'burger8.jpg,burger1.jpg,burger11.jpg'),
(10, 'pizza1.jpg,pizza1.jpg,pizza1.jpg'),
(11, 'pizza2.jpg,pizza2.jpg,pizza2.jpg'),
(12, 'pizza3.jpg,pizza3.jpg,pizza3.jpg'),
(13, 'pizza4.jpg,pizza4.jpg,pizza4.jpg'),
(14, 'pizza5.jpg,pizza5.jpg,pizza5.jpg'),
(15, 'pizza6.jpg,pizza6.jpg,pizza6.jpg'),
(16, 'pizza7.jpg,pizza7.jpg,pizza7.jpg'),
(17, 'pizza8.jpg,pizza8.jpg,pizza8.jpg'),
(18, 'pasta2.png,pasta2.png,pasta2.png'),
(19, 'pasta3.png,pasta3.png,pasta3.png'),
(20, 'pasta1.jpg,pasta1.jpg,pasta1.jpg'),
(21, 'fries1.jpg,fries1.jpg,fries1.jpg'),
(22, 'fries2.jpg,fries2.jpg,fries2.jpg'),
(23, 'fries3.jpg,fries3.jpg,fries3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang chờ duyệt'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_user`, `date_create`, `state`) VALUES
(2, 28, '21-12-2021', 'Deliver successfully'),
(3, 28, '21-12-2021', 'Deliver successfully'),
(4, 15, '22-12-2021', 'Deliver successfully'),
(5, 43, '22-12-2021', 'Deliver successfully'),
(6, 15, '22-12-2021', 'Deliver successfully');

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE `bill_products` (
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_topping` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_products`
--

INSERT INTO `bill_products` (`id_bill`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`) VALUES
(1, 1, 3, 2, 5, 466500),
(1, 2, 1, 5, 1, 50000),
(2, 19, 3, 3, 5, 652750),
(2, 1, 1, 5, 1, 44300),
(3, 1, 2, 3, 4, 249200),
(3, 17, 4, 4, 7, 973000),
(4, 5, 4, 3, 7, 679000),
(4, 10, 2, 5, 2, 187300),
(5, 5, 3, 2, 5, 440000),
(5, 19, 3, 2, 7, 955850),
(6, 1, 3, 3, 3, 261900),
(6, 19, 1, 5, 1, 87550);

-- --------------------------------------------------------

--
-- Table structure for table `buy_history`
--

CREATE TABLE `buy_history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_create` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_confirm` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_history`
--

INSERT INTO `buy_history` (`id`, `id_user`, `date_create`, `date_confirm`) VALUES
(1, 25, '21-10-2021', '21-10-2021'),
(2, 28, '21-11-2021', '21-11-2021'),
(3, 28, '21-12-2021', '21-12-2021'),
(4, 15, '22-12-2021', '22-12-2021'),
(5, 43, '22-12-2021', '22-12-2021'),
(6, 15, '22-12-2021', '22-12-2021');

-- --------------------------------------------------------

--
-- Table structure for table `buy_products_history`
--

CREATE TABLE `buy_products_history` (
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_topping` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buy_products_history`
--

INSERT INTO `buy_products_history` (`id_bill`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`) VALUES
(1, 1, 3, 2, 5, 466500),
(1, 2, 1, 5, 1, 50000),
(2, 19, 3, 3, 5, 652750),
(2, 1, 1, 5, 1, 44300),
(3, 1, 2, 3, 4, 249200),
(3, 17, 4, 4, 7, 973000),
(4, 5, 4, 3, 7, 679000),
(4, 10, 2, 5, 2, 187300),
(5, 5, 3, 2, 5, 440000),
(5, 19, 3, 2, 7, 955850),
(6, 1, 3, 3, 3, 261900),
(6, 19, 1, 5, 1, 87550);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_topping` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_Id` int(255) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `cus_img` varchar(100) DEFAULT NULL,
  `Birthday` date NOT NULL,
  `Phone` char(11) NOT NULL,
  `province/city` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `wards` varchar(50) DEFAULT NULL,
  `add_Address` varchar(100) DEFAULT NULL,
  `rank` varchar(20) NOT NULL DEFAULT 'Bronze',
  `Comment` text DEFAULT NULL,
  `DayCreate` date NOT NULL DEFAULT current_timestamp(),
  `Permission` varchar(20) NOT NULL DEFAULT 'Customer',
  `comment_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_Id`, `Username`, `Email`, `Password`, `cus_img`, `Birthday`, `Phone`, `province/city`, `district`, `wards`, `add_Address`, `rank`, `Comment`, `DayCreate`, `Permission`, `comment_date`) VALUES
(15, 'Phạm Văn Thanh', 'thanhpham@gmail.com', '821f3157e1a3456bfe1a000a1adf0862', '20210326_215034.jpg', '2000-07-11', '0348477517', NULL, NULL, NULL, NULL, 'Gold', 'I love store', '2021-11-29', 'Admin', '22-12-2021'),
(25, 'Nguyễn Thị Bích Hạnh', 'bichhanh@gmail.com', '821f3157e1a3456bfe1a000a1adf0862', 'z2978200246041_376de4a1fa540f653e1a582455c5513c.jpg', '1999-11-19', '02345678', NULL, NULL, NULL, NULL, 'Silver', NULL, '2021-11-29', 'Customer', ''),
(28, 'Phạm Văn Thanh', 'robertthanh1107@gmail.com', '821f3157e1a3456bfe1a000a1adf0862', '20210418_163922.jpg', '2000-07-11', '0348477519', 'Tiền Giang', 'Châu Thành', 'Tân Thạch', '547 ấp 4', 'Gold', 'the website is \"magic\"! I like it so much.', '2021-11-29', 'Customer', '18-12-2021'),
(30, 'Nguyễn Trường Sinh', 'truongsinh@gmail.com', '821f3157e1a3456bfe1a000a1adf0862', 'Tuyển-tập-hình-nền-4K-dành-cho-máy-tính-đẹp-3.jpg', '2000-12-25', '0947422456', 'Tiền Giang', 'Châu Thành', 'Tân Thới', '54, Lý Đức', 'Plantium', 'Store is amazing for me.', '2021-12-08', 'Customer', '17-12-2021'),
(42, 'Nguyen Sinh', '321@gmail.com', '4297f44b13955235245b2497399d7a93', '11111.png', '2001-03-13', '0329994099', ' ', ' ', ' ', ' ', 'Bronze', 'I love the store', '2021-12-17', 'Customer', '18-12-2021'),
(43, 'Võ Ngọc Tuấn', 'ngoctuan@mail.com', '1bbd886460827015e5d605ed44252251', 'cap-nhat-nhung-bo-hinh-nen-do-hoa-dep-chu-de-phong-canh-cho-iphone-1.jpg', '1999-12-20', '02753860202', ' ', ' ', ' ', ' ', 'Gold', 'The grate store\r\n', '2021-12-20', 'Customer', ''),
(44, 'Võ Ngọc Tuấn', 'ngoctuan@gmail.com', '1bbd886460827015e5d605ed44252251', NULL, '2000-07-11', '0348477517', NULL, NULL, NULL, NULL, 'Bronze', NULL, '2021-12-22', 'Customer', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type_Id` int(11) NOT NULL,
  `Decription` varchar(500) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Sale` int(100) DEFAULT NULL,
  `Feature` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Type_Id`, `Decription`, `image`, `Price`, `Sale`, `Feature`) VALUES
(1, 'Burger Double Double', 1, 'The burger with beef is a combination of panade, bread and meatballs soaked in milk to soften and moisten. Sometimes there are aromas commonly found in Mexican chorizo emotions, such as coriander, paprika and cumin.', 'burger1.jpg', 59000, 30, 1),
(2, 'Shrimp Burger', 1, 'This shrimp burger is stuffed with German cheese and greens. German food is famous for its healthy ingredients like vegetables and olive oil. Therefore, these burgers are a healthier alternative to traditional burgers.', 'burger2.jpg', 47000, 0, 1),
(3, 'Burger Bulgogi', 1, 'Beef sandwich, served with sautéed onions with rich Silton cheese. French Roll and Grill is an easy-to-make, delicious burger.', 'burger3.jpg', 44000, 10, 1),
(4, 'Premium Chicken Burger', 1, 'Enjoy the taste of Thanksgiving all year long with turkey burgers. Meat for filling should choose to buy free-range turkey breast meat, this is white meat, very low in fat and calories. Served with dried vegetables and red grapes.', 'burger4.jpg', 45000, 0, 1),
(5, 'Beef Egg Teriyaki Burger', 1, 'The beef and egg combination gives the burger a classic, low-fat Italian flavor while ensuring the meat doesn\'t break down during cooking. Teriyaki Egg Burger Cheese and Spaghetti Sauce are the perfect combination.', 'burger5.jpg', 36000, 0, 1),
(6, 'Fish Burger', 1, 'Soaking the cucumbers for a short time will give the burgers a crunchy sour taste. Panko and egg will help the meat stick together. Use coriander for your burgers if you want a bit of an herbal twist.', 'burger6.jpg', 33000, 5, 0),
(7, 'Burger Cheese', 1, 'A traditional hamburger will taste better when you add onions, a few pieces of bread and egg whites to the meat. Using muffins, which are usually smaller than pies, blue cheese and meat become the main flavor of the dish. You can use shredded Swiss Cheddar if you don\'t like blue cheese.', 'burger7.jpg', 78000, 0, 0),
(8, 'Teriyaki Burger', 1, 'If you add oranges, ginger and soybeans to the meat, the chicken burger is still not very good. Need to add some delicious sauce or more cheese to match the burgers. The sauce is made from a blend of cream, cheese, along with spicy, sweet Asian flavors that can become a staple in your kitchen.', 'burger8.jpg', 53000, 0, 1),
(10, 'Okonomiyaki Pizza', 2, 'Okonomiyaki is commonly known as Japanese pancake. This delicious pie combines local ingredients in classic pizza style. The dough is baked directly on the stove, depending on the region and the preferences of the eater, more fillings can be added.', 'pizza1.jpg', 89000, 15, 0),
(11, 'Extravaganza Pizza', 2, 'This unique version of pizza does not have the traditional round shape, they are usually cut into rectangular pieces and indispensable onions, thinly sliced pork belly. The name Tarte Flambee (baked in fire) also somewhat reflects the way it is baked in the oven. Tarte Flambee will reach the ideal deliciousness when baked at the highest temperature.', 'pizza2.jpg', 89000, 0, 0),
(12, 'Ocean Mania Pizza', 2, 'This is a very popular street food in Hungary. The filling couldn\'t be more filling with more cheese, sour cream, onions and shrimp if you ask for it. The base of Langos cake is made from dough and fried on a pan.', 'pizza3.jpg', 89000, 0, 0),
(13, 'Pizzamin Sea Pizza', 2, 'Hand-sized round cakes filled with minced lamb, pine nuts and green onions are considered pizza in Syria. Sfiha is not only famous in Syria but also quite famous in the Middle East', 'pizza4.jpg', 92000, 20, 0),
(14, 'Meat Lovers Pizza', 2, 'A great combination of pizza and sandwich, Meat Lovers are very popular in Poland. Cheese, mushrooms and lots of onions, all spread on a long bread, then toasted so the cheese melts and the ingredients smell delicious.', 'pizza5.jpg', 94000, 0, 0),
(15, 'Pepperoni Feast Pizza', 2, 'Pepperoni Feast Pizza is a Korean favorite and a familiar dish in kimchi cuisine. There are many varieties of Pepperoni Feast Pizza, but combining this delicious dish with a crispy crust and sauce makes for a delicious version of pizza.', 'pizza6.jpg', 89000, 0, 0),
(16, 'Veggie Mania Pizza', 2, 'Hailing from the hometown of pizza, Veggie Manias is traditional and simple to a minimum. In addition to the thick base with a cheese border, the filling is simply the familiar ketchup and mozzarella cheese.', 'pizza7.jpg', 69000, 15, 0),
(17, 'Cheese Mania Pizza', 2, 'Cheese Mania consists of a slice of toast along with vegetables usually red bell peppers and Spanish sausage. The filling may vary depending on the taste and availability of ingredients in each region.', 'pizza8.jpg', 69000, 0, 0),
(18, ' Premium Pasta', 3, 'Pasta Premium comes in a variety of widths, curls, and colors, but they share the same long strand shape, which is eaten by gently turning the fork to roll the noodles. This Pasta is served with olive oil, cream or tomato sauce.', 'pasta2.png', 99000, 0, 0),
(19, 'Cheese Pasta', 3, 'Pasta Cheese comes in a variety of widths, curls and colors, Tubular Pasta also has a few differences such as smooth or ribbed body, round head or diagonal flap. Pasta is served with a thick sauce. This type is suitable for baking dishes.', 'pasta3.png', 89000, 5, 0),
(20, 'Beef Pasta', 3, 'Pasta Beef has a rich and distinctive shape for each region. Special noodles can be used in salads, soups or served with sauces. However, the sauce served with spaghetti is quite picky.', 'pasta1.jpg', 79000, 0, 0),
(21, 'Small French Fries', 4, 'This is a very popular type of french fries around the world. Depending on the country, you can cut the potatoes thin or thick, deep fry them, then mix them with sauces like mayonnaise, ketchup or peanut butter.', 'fries1.jpg', 23000, 5, 0),
(22, 'Medium French Fries', 4, 'This is a very popular type of french fries around the world. Depending on the country, you can cut the potatoes thin or thick, deep fry them, then mix them with sauces like mayonnaise, ketchup or peanut butter.', 'fries2.jpg', 35000, 0, 0),
(23, 'Large French Fries', 4, 'This is a very popular type of french fries around the world. Depending on the country, you can cut the potatoes thin or thick, deep fry them, then mix them with sauces like mayonnaise, ketchup or peanut butter.', 'fries3.jpeg', 46000, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `Type_Id` int(11) NOT NULL,
  `Type_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`Type_Id`, `Type_Name`) VALUES
(1, 'Burger'),
(2, 'Pizaa'),
(3, 'Pasta'),
(4, 'Fries');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_value` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_value`, `id_user`, `id`, `id_product`, `comment`, `date`) VALUES
(3, 30, 25, 2, 'The Burger is perfect. It\'s the first time I eat it, but the burger does not let me down.', '12/12/2021'),
(4, 25, 26, 2, 'I like it!', '15/12/2021'),
(4, 15, 40, 2, 'Product is good', '22-12-2021'),
(2, 15, 39, 3, 'fff', '22-12-2021'),
(4, 28, 38, 19, 'The pasta is nice', '21-12-2021');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size`, `price`, `id`) VALUES
('S', 0, 1),
('M', 15000, 2),
('L', 40000, 3),
('X', 55000, 4),
('XL', 75000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `Store_Id` int(11) NOT NULL,
  `Store_Name` varchar(50) NOT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Phone_Number` char(14) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Twitter` varchar(200) DEFAULT NULL,
  `Linkedin` varchar(200) DEFAULT NULL,
  `Instagram` varchar(200) DEFAULT NULL,
  `Pinterest` varchar(200) DEFAULT NULL,
  `Opening day` varchar(20) DEFAULT NULL,
  `Open time` varchar(20) DEFAULT NULL,
  `Long Description` varchar(500) DEFAULT NULL,
  `Short description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`Store_Id`, `Store_Name`, `Location`, `Phone_Number`, `Email`, `Facebook`, `Twitter`, `Linkedin`, `Instagram`, `Pinterest`, `Opening day`, `Open time`, `Long Description`, `Short description`) VALUES
(1, 'Loterria', '53, Vo Van Ngan, Linh Chieu, Thu Đuc', '02753860202', 'lotteria.com', 'facebook.com', 'twitter.com', 'Linkedin.com', 'Instagram.com', 'Pinterest.com', 'Every day', '8h00 - 22h00', 'The chain\'s online food store has also been warmly welcomed by users and gradually spread to other provinces and cities across the country. The strength of the online food chain is that it has an extremely rich source of goods, the quality is thoroughly checked, the after-sales service is similar to that of an online grocery store, and especially the convenient location. \n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nostrum earum odit tempore vero omnis facere est saepe optio', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem nostrum earum odit tempore vero omnis facere est saepe optio! Culpa ducimus animi, laborum aliquam deleniti tempore rem, nisi nam dolore');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `toping` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`toping`, `price`, `id`) VALUES
('Salted egg', 20000, 1),
('Cheese', 12000, 2),
('Salted turnip', 6000, 3),
('Fried egg', 15000, 4),
('No topping', 3000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrimg`
--
ALTER TABLE `arrimg`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_history`
--
ALTER TABLE `buy_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`Type_Id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`Store_Id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrimg`
--
ALTER TABLE `arrimg`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cus_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `Type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `Store_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
