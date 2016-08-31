--添加外键

--talbe drug_purchase_list
ALTER TABLE 表名 ADD FOREIGN KEY (字段名) REFERENCES 表名(字段名)

ALTER TABLE drug_purchase_list ADD FOREIGN KEY (userid) REFERENCES users(userid);

ALTER TABLE drug_purchase_list ADD FOREIGN KEY (supplier_id) REFERENCES supplier(supplier_id);

ALTER TABLE drug_purchase_list ADD FOREIGN KEY (purchase_batch) REFERENCES drug_purchase(purchase_batch);

ALTER TABLE drug_purchase_list ADD FOREIGN KEY (price_packing_id) REFERENCES price_packing(price_packing_id);

--table users
ALTER TABLE users ADD FOREIGN KEY (company_name) REFERENCES company(company_name);

--table drugs
ALTER TABLE drugs ADD FOREIGN KEY (class_id) REFERENCES class_info(class_id);
ALTER TABLE drugs ADD FOREIGN KEY (shangpin_id) REFERENCES shangpin_info(shangpin_id);
ALTER TABLE drugs ADD FOREIGN KEY (guige_id) REFERENCES guige(guige_id);
ALTER TABLE drugs ADD FOREIGN KEY (jixing_id) REFERENCES jixing(jixing_id);
ALTER TABLE drugs ADD FOREIGN KEY (med_in_type_id) REFERENCES med_in_type(med_in_type_id);
ALTER TABLE drugs ADD FOREIGN KEY (changjia_id) REFERENCES changjia(changjia_id);
ALTER TABLE drugs ADD FOREIGN KEY (supplier_id) REFERENCES supplier(supplier_id);




--删除外键
ALTER TABLE <表名> DROP CONSTRAINT <外键名>

ALTER TABLE drug_purchase_list DROP FOREIGN KEY drug_purchase_list_ibfk_2
--查看外键名

SHOW CREATE TABLE drug_purchase_list;





关于数据库
