
/*DROP TABLE `orderhd`;*/
CREATE TABLE `orderhd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `total` decimal(8,2) unsigned NOT NULL,
  `payment_ok` tinyint(3) unsigned NOT NULL default 0,
  `delivered_ok` tinyint(3) unsigned NOT NULL default 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `unique_orderhd_order_id` UNIQUE  (`order_id`),
  KEY `idx_orderhd_order_id` (`order_id`),
  KEY `idx_orderhd_user_id` (`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*drop table `orderdt`;*/
CREATE TABLE `orderdt` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `cant` bigint(20) unsigned NOT NULL,
  `price` decimal(8,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (order_id) REFERENCES orderhd(order_id),
  FOREIGN KEY (product_id) REFERENCES beers(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*drop table orderpay;*/
`expmonth` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
/*drop table orderadd;*/
CREATE TABLE `orderadd` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (order_id) REFERENCES orderhd(order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
