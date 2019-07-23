
-- ----------------------------
-- Records of websockets_statistics_entries
-- ----------------------------

-- ----------------------------
-- View structure for category_sales
-- ----------------------------
DROP VIEW IF EXISTS `category_sales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `category_sales` AS SELECT
	categories.name_en,
	order_dish_match.count,
  order_pay.total,
  order_pay.id,
  order_dish_match.order_id,
  order_dish_match.dish_id,
  dish_category_match.categories_id, 
  order_pay.created_at
FROM
  categories,	
  order_dish_match,
	dish_category_match,
	order_pay
WHERE
	order_dish_match.dish_id = dish_category_match.dish_id
AND dish_category_match.categories_id = categories.id 
AND order_dish_match.order_id = order_pay.order_id ;

-- ----------------------------
-- View structure for item_sales
-- ----------------------------
DROP VIEW IF EXISTS `item_sales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `item_sales` AS SELECT
	items.name,
	order_dish_match.count,
  order_pay.total,
  order_pay.id,
  order_dish_match.order_id,
  order_dish_match.dish_id,
  items.id as item_id, 
  order_pay.created_at, 
  order_dish_match.created_at as start_time, 
  order_dish_match.ready_time
FROM
  items,	
  order_dish_match,
	order_option_match,
	order_pay
WHERE
  items.id = order_option_match.item_id	
AND order_option_match.order_dish_id = order_dish_match.id 
AND order_dish_match.order_id = order_pay.order_id
ORDER BY order_dish_match.dish_id ;
SET FOREIGN_KEY_CHECKS=1;
