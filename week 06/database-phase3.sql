CREATE DATABASE IF NOT EXISTS farmers_market_db;

user farmers_market_db;

CREATE TABLE `phone_numbers_phn` (
  `id_phn` int,
  `id_usr_phn` int,
  `number_phn` varchar_12,
  `id_pht_phm` int
  FOREIGN KEY (`id_usr_phn`) REFERENCES `users_usr`(`id_usr`),
  FOREIGN KEY (`id_pht_phm`) REFERENCES `phone_types_pht`(`id_pht`)
);

CREATE TABLE `phone_types_pht` (
  `id_pht` int,
  `type_pht` varchar_10,
);

CREATE TABLE `vendors_vdn` (
  `id_vdn` int,
  `id_map_vdn` int,
  `id_usr_vdn` int,
  `is_organic_vdn` boolean,
  `business_name_vdn` tinytext,
  `id_prd_vdn` int
  FOREIGN KEY (`id_map_vdn`) REFERENCES `map_location_map`(`id_map`),
  FOREIGN KEY (`id_usr_vdn`) REFERENCES `users_usr`(`id_usr`),
  FOREIGN KEY (`id_prd_vdn`) REFERENCES `produce_prd`(`id_prd`)
);

CREATE TABLE `vendor_produce_vpd` (
  `id_vpd` int,
  `id_vdn_vpd` int,
  `id_prd_vpd` int,
  `quantity_vpd` int,
  `price_vpd` decimal(19,2),
  FOREIGN KEY (`id_vdn_vpd`) REFERENCES `vendors_vdn`(`id_vdn`)
  FOREIGN KEY (`id_prd_vpd`) REFERENCES `produce_prd`(`id_prd`)
);

CREATE TABLE `produce_categorys_pcg` (
  `id_pcg` int,
  `category_pcg` enum,
  `category_description_pcg` tinytext
);

CREATE TABLE `state_sta` (
  `id_sta` int,
  `name_sta` varchar_50,
  `abbreviation_sta` tinytext
);

CREATE TABLE `users_usr` (
  `id_usr` int,
  `email_usr` varchar_50,
  `password_usr` varchar_255,
  `address_usr` varchar_50,
  `city_usr` varchar_100,
  `id_sta_usr` int,
  `user_level_usr` enum,
  FOREIGN KEY (`id_sta_usr`) REFERENCES `state_sta`(`id_sta`)
);

CREATE TABLE `map_location_map` (
  `id_map` int,
  `map_location_map` int,
  `id_vdn_map` int
);

CREATE TABLE `produce_prd` (
  `id_prd` int,
  `id_cat_prd` int,
  `description_prd` tinytext,
  FOREIGN KEY (`id_cat_prd`) REFERENCES `produce_categorys_pcg`(`id_pcg`)
);

