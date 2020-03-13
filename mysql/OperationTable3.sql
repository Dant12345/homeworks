CREATE TABLE summUser (`summ_id` int(11) unsigned NOT NULL AUTO_INCREMENT,PRIMARY KEY (`summ_id`) USING BTREE )
SELECT c.cst_id
			,d.dcm_cst_id
			,d.dcm_id
			,d.dcm_summ
			,c.contact_first_name
			,SUM(d.dcm_summ)
FROM customers as c
	JOIN documents as d ON d.dcm_cst_id = c.cst_id
	
	GROUP BY c.contact_first_name;