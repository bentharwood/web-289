CREATE DATABASE IF NOT EXISTS farmers_market_db;

use farmers_market_db;

CREATE TABLE `phone_types_pht` (
  `id_pht` int PRIMARY KEY,
  `type_pht` varchar(10)
);

CREATE TABLE `state_sta` (
  `id_sta` int PRIMARY KEY,
  `name_sta` varchar(50),
  `abbreviation_sta` varchar(5)
);

CREATE TABLE `users_usr` (
  `id_usr` int PRIMARY KEY,
  `email_usr` varchar(50),
  `password_usr` varchar(255),
  `address_usr` varchar(50),
  `city_usr` varchar(50),
  `id_sta_usr` int,
  `user_level_usr` varchar(10),
  FOREIGN KEY (`id_sta_usr`) REFERENCES `state_sta`(`id_sta`)
);

CREATE TABLE `produce_categorys_pcg` (
  `id_pcg` int PRIMARY KEY,
  `category_pcg` enum('vegetable', 'fruit', 'grain', 'dairy', 'meat'),
  `category_description_pcg` tinytext
);

CREATE TABLE `produce_prd` (
  `id_prd` int PRIMARY KEY,
  `id_cat_prd` int,
  `description_prd` tinytext,
  FOREIGN KEY (`id_cat_prd`) REFERENCES `produce_categorys_pcg`(`id_pcg`)
);

CREATE TABLE `map_location_map` (
  `id_map` int PRIMARY KEY,
  `map_location_map` int,
  `id_vdn_map` int
);

CREATE TABLE `vendors_vdn` (
  `id_vdn` int PRIMARY KEY,
  `id_map_vdn` int,
  `id_usr_vdn` int,
  `is_organic_vdn` boolean,
  `business_name_vdn` tinytext,
  `id_prd_vdn` int,
  FOREIGN KEY (`id_map_vdn`) REFERENCES `map_location_map`(`id_map`),
  FOREIGN KEY (`id_usr_vdn`) REFERENCES `users_usr`(`id_usr`),
  FOREIGN KEY (`id_prd_vdn`) REFERENCES `produce_prd`(`id_prd`)
);

CREATE TABLE `vendor_produce_vpd` (
  `id_vpd` int PRIMARY KEY,
  `id_vdn_vpd` int,
  `id_prd_vpd` int,
  `quantity_vpd` int,
  `price_vpd` decimal(19,2),
  FOREIGN KEY (`id_vdn_vpd`) REFERENCES `vendors_vdn`(`id_vdn`),
  FOREIGN KEY (`id_prd_vpd`) REFERENCES `produce_prd`(`id_prd`)
);

CREATE TABLE `phone_numbers_phn` (
  `id_phn` int PRIMARY KEY,
  `id_usr_phn` int,
  `number_phn` varchar(10),
  `id_pht_phm` int,
  FOREIGN KEY (`id_usr_phn`) REFERENCES `users_usr`(`id_usr`),
  FOREIGN KEY (`id_pht_phm`) REFERENCES `phone_types_pht`(`id_pht`)
);