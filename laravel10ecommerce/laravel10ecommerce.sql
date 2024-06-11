-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel10ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rem Facilis', 'rem-facilis', '4.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(2, 'Voluptas Facere', 'voluptas-facere', '1.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(3, 'Dolores Mollitia', 'dolores-mollitia', '1.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(4, 'Qui Vitae', 'qui-vitae', '3.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(5, 'Quasi Rem', 'quasi-rem', '5.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(6, 'Ipsum Id', 'ipsum-id', '6.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dolor Id', 'dolor-id', '4.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(2, 'A Eius', 'a-eius', '6.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(3, 'Doloremque Qui', 'doloremque-qui', '5.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(4, 'Enim Quos', 'enim-quos', '4.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(5, 'Quaerat Voluptatem', 'quaerat-voluptatem', '1.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(6, 'Et Quaerat', 'et-quaerat', '2.png', '2024-06-06 22:00:28', '2024-06-06 22:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_29_110335_create_brands_table', 1),
(7, '2024_05_29_110753_create_categories_table', 1),
(8, '2024_05_29_110821_create_products_table', 1),
(9, '2024_06_03_092857_create_orders_table', 1),
(10, '2024_06_03_092921_create_order_items_table', 1),
(11, '2024_06_03_092949_create_shippings_table', 1),
(12, '2024_06_03_093020_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_date` date DEFAULT NULL,
  `canceled` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `status`, `is_shipping_different`, `delivered_date`, `canceled`, `created_at`, `updated_at`) VALUES
(1, 12, 14.00, 0.00, 2.94, 16.94, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'delivered', 0, NULL, NULL, '2024-06-07 08:36:13', '2024-06-08 19:43:07'),
(2, 12, 88.00, 0.00, 18.48, 106.48, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-07 18:01:08', '2024-06-07 18:01:08'),
(3, 12, 32.00, 0.00, 6.72, 38.72, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', NULL, '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-08 21:42:17', '2024-06-08 21:42:17'),
(4, 12, 2.00, 0.00, 0.42, 2.42, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-08 22:24:33', '2024-06-08 22:24:33'),
(5, 12, 2.00, 0.00, 0.42, 2.42, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-08 22:51:39', '2024-06-08 22:51:39'),
(6, 12, 44.00, 0.00, 9.24, 53.24, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-09 00:21:36', '2024-06-09 00:21:36'),
(7, 12, 1.00, 0.00, 0.21, 1.21, 'mark', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-09 00:55:35', '2024-06-09 00:55:35'),
(8, 13, 2.00, 0.00, 0.42, 2.42, 'Jay Ochavez', '09518893602', 'Bani', 'Poblacion Bani Pangsinan', 'Bani', 'Pangasinan', 'Philippines', 'Bani Market', '2407', 'home', 'ordered', 0, NULL, NULL, '2024-06-09 01:32:45', '2024-06-09 01:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` longtext DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `options`, `rstatus`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 7.00, 2, '[]', 0, '2024-06-07 08:36:13', '2024-06-07 08:36:13'),
(2, 16, 2, 22.00, 4, '[]', 0, '2024-06-07 18:01:08', '2024-06-07 18:01:08'),
(3, 24, 3, 1.00, 2, '[]', 0, '2024-06-08 21:42:17', '2024-06-08 21:42:17'),
(4, 2, 3, 15.00, 2, '[]', 0, '2024-06-08 21:42:17', '2024-06-08 21:42:17'),
(5, 8, 4, 2.00, 1, '[]', 0, '2024-06-08 22:24:33', '2024-06-08 22:24:33'),
(6, 24, 5, 1.00, 2, '[]', 0, '2024-06-08 22:51:39', '2024-06-08 22:51:39'),
(7, 23, 6, 22.00, 2, '[]', 0, '2024-06-09 00:21:36', '2024-06-09 00:21:36'),
(8, 24, 7, 1.00, 1, '[]', 0, '2024-06-09 00:55:35', '2024-06-09 00:55:35'),
(9, 24, 8, 1.00, 2, '[]', 0, '2024-06-09 01:32:45', '2024-06-09 01:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Eos Nisi', 'eos-nisi', 'Odit recusandae neque consequatur eos dolor eligendi. Asperiores qui dolores officiis cum ut. Deserunt quaerat et cumque.', 'Et enim explicabo libero accusamus consequatur velit consequatur provident. Fugiat modi itaque et eum rerum ut placeat. Recusandae rem necessitatibus laboriosam dignissimos quisquam eveniet. Magni ab iste sunt dolorem aliquam. Eveniet eveniet rerum repellendus necessitatibus et modi. Voluptatibus culpa sequi facere corrupti ipsum amet. Repudiandae nemo maxime saepe aliquam consequatur sint accusamus incidunt. Voluptatem magnam ea fugit. Officiis aut quia sapiente dolor. Aut ea sunt est cum.', 18.00, NULL, 'SMD313', 'instock', 0, 183, '9.png', '9.png', 3, 1, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(2, 'Vel Ratione', 'vel-ratione', 'Ut necessitatibus dolore explicabo culpa tempore eum. At ut accusamus ratione fugit necessitatibus. Est consequatur quos qui odio. Sint nesciunt libero est doloremque suscipit earum non.', 'Harum eligendi quo est similique minus a quis. Rerum sed quas perferendis autem a sed ut. Eos vero maiores dolor occaecati et vel. Iure quibusdam magni corrupti quo quisquam. Ut quaerat vitae quae et beatae. Ut pariatur non in dolore nobis officiis. Minima sapiente sit officia fuga et ipsum quis tempore. Nam et placeat laborum. Velit voluptate et voluptas qui qui. Est iste quod occaecati dolores et nobis laborum.', 15.00, NULL, 'SMD227', 'instock', 0, 193, '5.png', '5.png', 5, 2, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(3, 'Autem Cumque', 'autem-cumque', 'Nihil omnis ut quia quibusdam aperiam dolore. Amet nihil quo sit est non. Recusandae dolorum explicabo dolores distinctio. Quaerat et sit dignissimos eos. Recusandae voluptatem sint rerum aspernatur.', 'Hic reprehenderit voluptas qui dicta et consequatur dolore. Atque harum exercitationem molestias rem necessitatibus mollitia. Sunt quaerat fuga omnis qui assumenda officiis. Aut et doloribus iste dolor aperiam sed. Explicabo blanditiis non ut dolore. Voluptatem ea numquam magnam excepturi itaque. Inventore fugiat sequi voluptas vel accusamus fugiat.', 3.00, NULL, 'SMD277', 'instock', 0, 131, '23.png', '23.png', 2, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(4, 'Fuga Officia', 'fuga-officia', 'Dolorem sint aut esse dolorem rem sed. Reprehenderit perspiciatis dolores provident et deleniti. Animi vel amet enim quia.', 'At alias nemo qui porro. Id earum dicta autem maxime. Dignissimos aperiam expedita vel doloribus et sit. Libero quia vel quasi ullam voluptas deserunt eos. Repudiandae aperiam provident voluptas sit quisquam. Eligendi vel et consequatur. Voluptatem saepe est sit nam voluptas sit.', 20.00, NULL, 'SMD169', 'instock', 0, 130, '8.png', '8.png', 5, 2, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(5, 'Et Molestiae', 'et-molestiae', 'Nisi magnam officia excepturi quidem distinctio est quis. Non voluptatem ratione ut sint. Corrupti blanditiis iusto magni dolorem fuga.', 'Soluta soluta facere laudantium asperiores velit qui. Doloribus aut necessitatibus tenetur ex. Quia est labore sunt. Laudantium nemo commodi dignissimos aut dolorem rem quia. Ex odit officiis voluptas consequuntur optio asperiores. Accusamus qui soluta magnam quidem sunt consequatur est sit. Ut tempora exercitationem doloribus temporibus exercitationem accusantium quas.', 18.00, NULL, 'SMD155', 'instock', 0, 147, '1.png', '1.png', 3, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(6, 'Sit Rerum', 'sit-rerum', 'Aliquam est et explicabo minus earum et adipisci natus. Quo atque aut aliquid cum earum omnis. Laborum id perspiciatis veniam.', 'Quia neque eius ut illum accusantium ex. Adipisci earum ab aut. Vel praesentium molestias voluptas aut laborum. Omnis earum voluptates modi ea maxime unde pariatur. Voluptatem quis repellat ab accusantium et. Ut qui voluptas ea reprehenderit necessitatibus. Dolores nihil consequatur ducimus ex excepturi. Corrupti aperiam et illo modi esse ut earum omnis. Explicabo suscipit ex nostrum.', 9.00, NULL, 'SMD140', 'instock', 0, 154, '16.png', '16.png', 6, 2, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(7, 'In Dolorem', 'in-dolorem', 'Optio qui autem qui sapiente. Nisi doloribus voluptatem sunt nam. Et eius numquam enim.', 'Est error excepturi explicabo quis autem quos. Cumque officia facere earum consectetur nesciunt et. Voluptatem dolores non aut consequatur voluptatum. Quam ut nihil deleniti maiores dolorem et. Beatae non dolore eius numquam. Consectetur aut alias maxime aliquam. Eum magni unde reprehenderit. Natus aut suscipit amet modi quos doloremque. Minima maiores pariatur odit quo quo. Quis rerum aut excepturi eos. Unde est id non quo. Dolores laboriosam ex in ut.', 13.00, NULL, 'SMD227', 'instock', 0, 156, '9.png', '9.png', 6, 6, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(8, 'Possimus Placeat', 'possimus-placeat', 'Aspernatur atque placeat corporis pariatur architecto aut. Expedita quae at nam maiores impedit recusandae et. Vel quia aut blanditiis.', 'Quasi quo hic facilis placeat quis commodi est. Et provident ut fugit. Animi animi doloribus quod quisquam harum necessitatibus impedit nisi. Aut tempora amet beatae ut qui id. In neque rerum quibusdam expedita et sit consequatur ipsum. Ut omnis officia omnis beatae nihil. Saepe corrupti facere sit. Et qui quos rerum veritatis ut tenetur autem. Delectus aspernatur fuga corporis rerum consequuntur maxime tempora. Numquam perspiciatis ea eaque ad autem.', 2.00, NULL, 'SMD110', 'instock', 0, 168, '19.png', '19.png', 1, 5, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(9, 'Aut Doloribus', 'aut-doloribus', 'Ut et explicabo qui nulla in odit. Voluptatum omnis eius sapiente sint. Possimus est eligendi necessitatibus minima ut. Minus recusandae suscipit in optio quibusdam accusantium doloremque.', 'Sapiente quisquam exercitationem deserunt omnis dignissimos ipsa id. Ut ut eos sed cum sunt culpa qui. Enim unde quo praesentium voluptatem dolor omnis dolores. Aliquid quia dolor dolorem neque quas itaque est. Et eius sunt aut expedita. Dignissimos quo tempora veniam labore et. Vero ea est ut quaerat aut aut odio alias. Soluta saepe quis debitis eius non quos sit sed.', 6.00, NULL, 'SMD299', 'instock', 0, 176, '23.png', '23.png', 1, 2, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(10, 'Eos Sit', 'eos-sit', 'Laboriosam veritatis impedit ut eum et aspernatur error sed. Aut quam et quasi esse itaque laudantium. Ipsam atque in odio excepturi repudiandae ut. Corrupti ea corrupti qui maiores voluptatem nobis.', 'Optio similique in odit sit placeat. Accusantium hic qui ut voluptatem inventore natus numquam. Et impedit vel voluptas pariatur. Odit ad quia ab quod. Labore cumque aut sunt earum. Ratione rerum iure blanditiis assumenda. Repellat error quis fuga. Facere et atque voluptatem voluptates sequi in et. Ut alias aut qui delectus qui quis autem non. Molestias consequatur aliquam est. Dolor expedita iste est.', 8.00, NULL, 'SMD434', 'instock', 0, 176, '9.png', '9.png', 6, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(11, 'Eligendi Natus', 'eligendi-natus', 'Culpa delectus consectetur a omnis. Eveniet id asperiores eaque harum ab libero quos. Ipsa laboriosam ex accusantium fugiat. Iure et labore aspernatur omnis qui enim et molestias.', 'Voluptas porro occaecati sed. Dolores atque pariatur quis fuga. Harum quo enim eum et molestiae fuga. Repellendus id eos ex laudantium possimus iure in. Et est aut voluptas eaque et nihil est. Voluptate fuga explicabo inventore perspiciatis modi. Quisquam recusandae dolorum est ab quibusdam voluptas consequuntur. Et reiciendis enim ducimus voluptate aut in omnis. Quaerat molestias qui libero dolorem.', 3.00, NULL, 'SMD432', 'instock', 0, 126, '11.png', '11.png', 4, 5, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(12, 'Quisquam Quo', 'quisquam-quo', 'Vitae earum fuga dicta harum quia eligendi enim qui. Sapiente vitae veniam aliquid itaque voluptatem necessitatibus possimus reiciendis. Dignissimos sit tenetur eum non et temporibus ducimus aut.', 'Quos nesciunt nam et maiores. Perferendis aut praesentium qui nostrum aut cupiditate debitis. Dolor minus occaecati facere voluptas. Reiciendis cum dicta consectetur aut nostrum sunt quam ratione. Voluptatem a nemo nihil dolorem deleniti consequatur. Ratione a repudiandae et omnis aut fuga. Neque aut sint delectus asperiores nihil. Id nulla amet corrupti aperiam cumque ex. Rem officiis qui sed accusamus. Ipsam enim maiores illum sequi autem. Ullam consequuntur id quisquam animi repellat.', 13.00, NULL, 'SMD163', 'instock', 0, 155, '2.png', '2.png', 2, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(13, 'Autem Ut', 'autem-ut', 'Non eveniet similique architecto ullam ut cum unde. Quos libero nam rerum et culpa aut aut. Eos et possimus quasi iste ea sint expedita.', 'Debitis omnis accusantium illo nisi velit est. Vitae voluptate rerum dolor reiciendis quod qui minima. Consectetur eum rerum sit sed rem veniam. Eum rerum nulla quia est consequuntur necessitatibus. Voluptas adipisci facilis dolore et eaque non natus ut. Aliquam quam quaerat praesentium quae enim eum ut. Necessitatibus repellendus aspernatur et dolor eos aut nesciunt. Debitis occaecati veritatis velit aut unde maiores. Facere sit rerum in. Quia tempora sequi numquam facere distinctio.', 16.00, NULL, 'SMD395', 'instock', 0, 155, '14.png', '14.png', 2, 5, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(14, 'Doloribus Est', 'doloribus-est', 'Est enim sit non quis accusamus et ea. Vel in id dolorem fugiat occaecati dolores. Recusandae suscipit quidem voluptas nisi nostrum.', 'Qui architecto nostrum error pariatur numquam eius possimus. Voluptatibus repudiandae eaque sapiente perspiciatis quia sit. Recusandae quam et voluptas dolor enim quod. Voluptatibus dolorem perspiciatis quis qui possimus odio sint. Excepturi et perspiciatis facilis reprehenderit cupiditate occaecati qui voluptatem. Id architecto natus ab quia culpa aliquam. Debitis quibusdam nesciunt dicta eaque et similique.', 9.00, NULL, 'SMD499', 'instock', 0, 115, '24.png', '24.png', 4, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(15, 'Provident Sunt', 'provident-sunt', 'At sit ut est eum explicabo vitae quia necessitatibus. Fuga ipsa modi blanditiis iste dicta. Quo vel blanditiis accusamus neque hic.', 'Ratione veritatis maxime in est ipsum sequi. Dignissimos id enim sit voluptatem ea. Sint qui sint omnis eum. Et illo odit tempore ullam commodi et. Labore sint debitis dolor nesciunt corporis. Et eos itaque sequi qui. Quaerat eius sequi eligendi. Placeat magni ipsum veritatis est quae corrupti error et. Qui explicabo et quasi autem blanditiis. Saepe quis nisi eum ut sint. Est eligendi suscipit enim.', 17.00, NULL, 'SMD470', 'instock', 0, 118, '4.png', '4.png', 2, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(16, 'Qui Iure', 'qui-iure', 'Praesentium quia sunt voluptate rerum minus commodi. Consequatur quae qui aut et ut. Perspiciatis qui quas officia sed aspernatur fugiat eaque. Laudantium et et et ut aperiam asperiores.', 'Omnis hic saepe et sit. Ut quaerat velit porro consequatur. Sint molestiae et nisi libero voluptas quas voluptates aspernatur. Sint repellendus deleniti veniam expedita laborum unde. Dolorem quaerat facere aut reprehenderit quibusdam. Nihil dolorem sed fuga cum eveniet. Minus qui animi qui illo. Id molestiae sit est fuga. Aut magnam et dolorem sunt asperiores.', 22.00, NULL, 'SMD275', 'instock', 0, 155, '7.png', '7.png', 4, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(17, 'Unde Eaque', 'unde-eaque', 'Facilis qui aut omnis quia. Qui dolores ut error et voluptates numquam.', 'Sint amet debitis delectus autem. Sit qui velit est. Et ipsum repudiandae quo quidem. Deleniti possimus officia totam aspernatur minima ratione occaecati magnam. Qui earum cumque voluptate odio sit numquam quo. Iste reiciendis qui ut et sunt sunt. Numquam repellendus fugiat ea dolores iure. Et culpa odio quo sunt veritatis et. Sit dolorem exercitationem aut nulla voluptatem. Temporibus error officia facere earum illo aut enim. Qui quae dolorum delectus officia provident est et.', 14.00, NULL, 'SMD459', 'instock', 0, 151, '4.png', '4.png', 5, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(18, 'Nostrum Sit', 'nostrum-sit', 'Et voluptatem reiciendis a. Labore voluptatem ut eos quis. Reiciendis molestias id eligendi veniam natus. Veritatis dolores quibusdam optio possimus.', 'Et in atque aut sunt expedita quis. Repellendus harum eveniet illum ad quae nobis dolorum. Doloremque soluta similique omnis atque vel laborum velit mollitia. Ut animi incidunt facere beatae sequi. Perferendis qui inventore fugiat qui rerum fugit. Voluptatem accusantium corporis voluptatibus occaecati. Id aut sunt error. Vero temporibus eos quas cumque.', 11.00, NULL, 'SMD297', 'instock', 0, 168, '9.png', '9.png', 5, 1, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(19, 'Blanditiis Dolores', 'blanditiis-dolores', 'Mollitia totam vel quia. Doloribus explicabo recusandae maiores doloremque. Sed necessitatibus voluptatem itaque asperiores enim vitae non.', 'Non saepe modi ut et itaque sint. Pariatur consequatur nam facilis labore amet. Enim et fuga eius et sunt. Alias labore consequatur quos eligendi quidem. Est qui id quo. Tempore laboriosam sint omnis qui nulla. Iusto laborum quis ducimus at qui. Itaque et laudantium dignissimos. Ducimus officia ut vero eveniet doloribus nam. Ut quae rerum blanditiis dignissimos.', 19.00, NULL, 'SMD467', 'instock', 0, 109, '23.png', '23.png', 3, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(20, 'Neque Eveniet', 'neque-eveniet', 'Alias deserunt iusto ut ut inventore voluptatum et. Voluptatem odit ex consequatur quae sapiente ad optio. Recusandae et voluptas ab vero voluptas illum minima.', 'Quaerat et debitis ipsam. Sit et qui nihil officia nam sequi enim. Occaecati perferendis repellat vel deserunt. Iure qui ipsum deleniti praesentium. Illum dignissimos sequi ab qui. Hic eius alias neque repellat. Mollitia reiciendis dolorem adipisci. Ea aperiam quae dolorum minus sit qui dolor dolorum. Cumque repudiandae ut accusantium animi sunt numquam optio. Accusantium esse et assumenda autem eaque aliquid. Eius qui nostrum sit praesentium non et iure.', 10.00, NULL, 'SMD219', 'instock', 0, 139, '8.png', '8.png', 4, 6, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(21, 'Ratione Corrupti', 'ratione-corrupti', 'Incidunt voluptatem incidunt esse. Rerum rerum dolor eum unde et a dolores assumenda. Perspiciatis rem soluta velit sunt est dolor et rerum.', 'Accusantium deserunt velit animi itaque numquam. Sit a qui dicta et. Culpa placeat dolores est quam architecto dolore vitae. Est quibusdam quo temporibus hic deserunt. Est consequuntur qui molestiae nulla necessitatibus rerum eligendi. Est suscipit sequi aut quaerat quibusdam. Minus reiciendis repellendus earum dolor architecto. Quaerat inventore cum consequatur aspernatur ut sint. Delectus quis dolor est. Quidem eos molestiae eaque optio consequuntur reprehenderit consequatur.', 7.00, NULL, 'SMD429', 'instock', 0, 110, '13.png', '13.png', 2, 4, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(22, 'Quasi Aut', 'quasi-aut', 'Vel sequi ex veritatis similique soluta. Quo soluta officiis qui molestiae eaque cum quo. Ullam asperiores quia aut quaerat quod et.', 'Ut quia dolores aut corrupti explicabo neque hic adipisci. Animi consequuntur nesciunt neque perspiciatis omnis id. Inventore ut aut saepe odit iure harum quia iste. Dolores repellat veritatis laudantium. Ipsum quas ut mollitia. Nesciunt autem dolor aut architecto ea aut. Quisquam nulla animi in pariatur quasi minus officiis. Saepe ut magnam voluptas. Ea quam aut error distinctio odio. Quo excepturi consequatur rerum corrupti. Tenetur voluptas dolores illum sunt et.', 1.00, NULL, 'SMD445', 'instock', 0, 132, '16.png', '16.png', 3, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(23, 'Ratione Voluptate', 'ratione-voluptate', 'Laudantium impedit quia soluta nemo sapiente earum animi quasi. Ut officiis explicabo iste ex. Voluptatum perferendis laborum amet id et optio autem.', 'Fugiat iure asperiores qui. Delectus est repellat et qui non ut nobis non. Officia minus et dolorum placeat. Dolor quia ut sit sit molestiae voluptas. Dolores laborum ullam eaque animi in. Cupiditate corrupti ut mollitia enim error. Et similique ex voluptas enim et accusantium voluptatem. Dolorem harum ut et repellat vero vel eius rerum. Eveniet hic recusandae est magni aut voluptas. Rerum omnis et aliquam aut. Animi quo et dolore omnis id et.', 22.00, NULL, 'SMD316', 'instock', 0, 132, '21.png', '21.png', 4, 3, '2024-06-06 22:00:28', '2024-06-06 22:00:28'),
(24, 'Expedita Sed', 'expedita-sed', 'Sit quos consectetur laboriosam temporibus. Beatae nulla aut dicta nemo id vel ducimus eveniet. Dolorum ut eos et numquam omnis.', 'Suscipit consequatur et neque porro. Beatae placeat optio laboriosam omnis sapiente. Vel voluptatibus earum eaque fuga exercitationem incidunt. Ut voluptas recusandae nihil minima magnam. Id est et in omnis ullam et. Et ut praesentium atque delectus in sunt. Qui eos aspernatur aut. Molestiae ipsum voluptas laborum quaerat dolor.', 1.00, NULL, 'SMD341', 'instock', 0, 139, '2.png', '2.png', 3, 6, '2024-06-06 22:00:28', '2024-06-06 22:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 'cod', 'approved', '2024-06-07 08:36:13', '2024-06-08 19:43:07'),
(2, 12, 2, 'cod', 'pending', '2024-06-07 18:01:08', '2024-06-07 18:01:08'),
(3, 12, 3, 'cod', 'pending', '2024-06-08 21:42:17', '2024-06-08 21:42:17'),
(4, 12, 4, 'cod', 'pending', '2024-06-08 22:24:33', '2024-06-08 22:24:33'),
(5, 12, 5, 'cod', 'pending', '2024-06-08 22:51:39', '2024-06-08 22:51:39'),
(6, 12, 6, 'cod', 'pending', '2024-06-09 00:21:36', '2024-06-09 00:21:36'),
(7, 12, 7, 'cod', 'pending', '2024-06-09 00:55:35', '2024-06-09 00:55:35'),
(8, 13, 8, 'cod', 'pending', '2024-06-09 01:32:45', '2024-06-09 01:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR',
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `phone_number`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Imogene O\'Conner', 'qpowlowski@example.org', '2024-06-06 22:00:28', '$2y$10$6w/FgBJI7WnsaFN2VfZxgOEdE5gxUUoKM23EuRI7bOwvtri0oUl7S', 'USR', '+12077033863', '565 Muller Manors\nCecilechester, AR 93241', 'vohcwPU6m0ubOETBoisEwEoK6hMrfFYEYZuDC90Sico50diLq0cMYUuf02r0', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(2, 'Dr. Ole Lockman DVM', 'ebert.cordie@example.net', '2024-06-06 22:00:28', '$2y$10$LXcIOCH3MHnyxdQegbjjMeCEuKD0QxPiTDgeEP780h6.ihKVKJIeO', 'USR', '434.317.7645', '11852 Emanuel Shore\nNew Brayan, VA 28701', '1xpfaaYYxo', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(3, 'Lavonne Wolf', 'oconnell.roxane@example.net', '2024-06-06 22:00:29', '$2y$10$ibBFFOflaV6IVruKNzZ2Le6Vn9bIv8kDbz0z1CdC/SdcTU.L9XYgu', 'USR', '1-870-982-6023', '59500 Wilmer Ridges Suite 566\nSouth Weldonshire, DC 84191', 'j608dFd9lh', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(4, 'Cheyanne Reichert II', 'ortiz.davin@example.com', '2024-06-06 22:00:29', '$2y$10$QiBJgcfKwT3OXi9AYfUPleEByQ70hGR.6r9Jdus/TTn6.6M54w30a', 'USR', '223.532.3591', '265 Emerson Fall Suite 263\nHartmannburgh, NH 17213-1518', 'IOZyjEGNpQ', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(5, 'Dr. Horacio Bruen PhD', 'fkeeling@example.org', '2024-06-06 22:00:29', '$2y$10$bmHmS8arCcBfiTJcysb41.LsR8PllqqPzPyH2LIfGFhfXA.SoTshK', 'USR', '+1 (281) 904-7591', '8744 Diego Islands Suite 078\nBlandashire, UT 88458-9075', 'bNsKI5RWfj', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(6, 'Josianne Upton', 'stracke.gideon@example.org', '2024-06-06 22:00:29', '$2y$10$JSP0M2a/DwxgTFQSNssnUetyNvlk83KvSOfwDB5mH4fPazah2eHy.', 'USR', '934-386-2963', '52556 Huels Cliffs\nHuelborough, CT 33035', 'rKXtFCFD3E', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(7, 'Estrella Altenwerth', 'vpfeffer@example.net', '2024-06-06 22:00:29', '$2y$10$aXBGZqmMZOjH3y2m2.9yL.3UCVWpdG9MHFOrXAv6fFu/rDvVsAzeS', 'USR', '+1-269-413-5198', '71600 Roderick Place\nLilystad, MO 01246-9711', 'ARCYbPQgsa', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(8, 'Gabrielle Herman', 'marta16@example.com', '2024-06-06 22:00:29', '$2y$10$zDKfJQ4Upb4Nt/K7bhgWkeV8p4Nj1TD2xD8Fd87Jxaao9OyEvUVc.', 'USR', '+1-256-731-8364', '8820 Kozey Common Apt. 365\nEast Evalyn, IA 39413-7905', 'ZVQ6CGiQzL', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(9, 'Dr. Taryn Howell', 'ida96@example.com', '2024-06-06 22:00:29', '$2y$10$AAwQdLAXGNsD0.8d.GydluglfeHnJsuzZbmeWH46nzLTmXMHQDhOW', 'USR', '820-629-4206', '7784 Carter Lake Suite 846\nMacejkovicmouth, PA 53630-8997', 'eAOBsbne5O', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(10, 'Bridget Farrell', 'milo.mitchell@example.net', '2024-06-06 22:00:29', '$2y$10$tjrBCV8VDQlMM3JWWn80J.ygpSR6Yuwuu169vj/91nGtj4atCNlEK', 'USR', '+1-937-563-1380', '330 Adams Centers\nElnoraside, NJ 32217', 'xn12n4wwkL', '2024-06-06 22:00:29', '2024-06-06 22:00:29'),
(11, 'Shahaff Acmad', 'acmadshahaff@gmail.com', NULL, '$2y$10$FHMYKX0pZNgFbawZ55hR7uvWE.S1/Uu6m5VUnz5wL9RSzMJ9kjrNq', 'ADM', NULL, NULL, NULL, '2024-06-06 22:01:30', '2024-06-06 22:01:30'),
(12, 'mark', 'mark@gmail.com', NULL, '$2y$10$B3lP.Xx6T5bo9a16M0mW..PF5KDbnkRrBjC4c7RYOjnMX/qbQetVi', 'USR', NULL, NULL, NULL, '2024-06-06 22:03:51', '2024-06-06 22:03:51'),
(13, 'Jay Ochavez', 'jay@gmail.com', NULL, '$2y$10$uXr61DikDC4FjB3Ie47UAu8My7EBYkV1oIqpxFOY7zdtu2VGI/JXi', 'USR', NULL, NULL, NULL, '2024-06-09 01:27:30', '2024-06-09 01:27:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
