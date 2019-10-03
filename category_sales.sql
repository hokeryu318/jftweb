
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
  categories.parent_id as parent_id,
  categories.id as category_id, 
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

SET FOREIGN_KEY_CHECKS=1;
