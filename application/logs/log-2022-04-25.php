INFO - 2022-04-25 12:20:54 --> Config Class Initialized
INFO - 2022-04-25 12:20:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:20:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:20:54 --> Utf8 Class Initialized
INFO - 2022-04-25 12:20:54 --> URI Class Initialized
INFO - 2022-04-25 12:20:54 --> Router Class Initialized
INFO - 2022-04-25 12:20:54 --> Output Class Initialized
INFO - 2022-04-25 12:20:54 --> Security Class Initialized
DEBUG - 2022-04-25 12:20:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:20:54 --> Input Class Initialized
INFO - 2022-04-25 12:20:54 --> Language Class Initialized
INFO - 2022-04-25 17:50:54 --> Loader Class Initialized
INFO - 2022-04-25 17:50:54 --> Helper loaded: url_helper
INFO - 2022-04-25 17:50:54 --> Helper loaded: file_helper
INFO - 2022-04-25 17:50:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:50:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:50:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:50:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:50:54 --> Upload Class Initialized
INFO - 2022-04-25 17:50:54 --> Table Class Initialized
INFO - 2022-04-25 17:50:54 --> Helper loaded: form_helper
INFO - 2022-04-25 17:50:54 --> Form Validation Class Initialized
INFO - 2022-04-25 17:50:54 --> Controller Class Initialized
INFO - 2022-04-25 17:50:54 --> Model "Api_model" initialized
INFO - 2022-04-25 17:50:54 --> Model "Common_model" initialized
ERROR - 2022-04-25 17:50:54 --> Query error: In aggregated query without GROUP BY, expression #2 of SELECT list contains nonaggregated column 'athealcpanel_atheal.tbl_partners.latitude'; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT GROUP_CONCAT(tbl_partner_device.device_token) AS registration_ids, 111.045 * DEGREES(ACOS(COS(RADIANS('23.0359094')) * COS(RADIANS(tbl_partners.latitude)) * COS(RADIANS(tbl_partners.longitude) - RADIANS('72.5610054')) + SIN(RADIANS('23.0359094')) * SIN(RADIANS(tbl_partners.latitude)))) AS `distance_in_km`
FROM `tbl_partners`
LEFT JOIN `tbl_partner_device` ON `tbl_partners`.`id` = `tbl_partner_device`.`partner_id`
WHERE `tbl_partners`.`category` = '4'
AND `speciality` = '45'
AND `tbl_partners`.`is_homevisit` = '1'
AND `tbl_partners`.`home_visit_main_amt` > 0
AND `tbl_partners`.`status` = '1'
AND `status_by_admin` = '1'
AND `tbl_partner_device`.`device_type` = 'A'
HAVING `distance_in_km` < 30
ORDER BY `distance_in_km` ASC
INFO - 2022-04-25 17:50:54 --> Language file loaded: language/english/db_lang.php
INFO - 2022-04-25 12:25:13 --> Config Class Initialized
INFO - 2022-04-25 12:25:13 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:13 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:13 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:13 --> URI Class Initialized
INFO - 2022-04-25 12:25:13 --> Router Class Initialized
INFO - 2022-04-25 12:25:13 --> Output Class Initialized
INFO - 2022-04-25 12:25:13 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:13 --> Input Class Initialized
INFO - 2022-04-25 12:25:13 --> Language Class Initialized
INFO - 2022-04-25 17:55:13 --> Loader Class Initialized
INFO - 2022-04-25 17:55:13 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:13 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:13 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:13 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:13 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:13 --> Upload Class Initialized
INFO - 2022-04-25 17:55:13 --> Table Class Initialized
INFO - 2022-04-25 17:55:13 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:13 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:13 --> Controller Class Initialized
INFO - 2022-04-25 17:55:13 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:13 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:13 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:13 --> Total execution time: 0.0090
INFO - 2022-04-25 12:25:15 --> Config Class Initialized
INFO - 2022-04-25 12:25:15 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:15 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:15 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:15 --> URI Class Initialized
INFO - 2022-04-25 12:25:15 --> Router Class Initialized
INFO - 2022-04-25 12:25:15 --> Output Class Initialized
INFO - 2022-04-25 12:25:15 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:15 --> Input Class Initialized
INFO - 2022-04-25 12:25:15 --> Language Class Initialized
INFO - 2022-04-25 17:55:15 --> Loader Class Initialized
INFO - 2022-04-25 17:55:15 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:15 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:15 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:15 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:15 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:15 --> Upload Class Initialized
INFO - 2022-04-25 17:55:15 --> Table Class Initialized
INFO - 2022-04-25 17:55:15 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:15 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:15 --> Controller Class Initialized
INFO - 2022-04-25 17:55:15 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:15 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:15 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:15 --> Total execution time: 0.0037
INFO - 2022-04-25 12:25:15 --> Config Class Initialized
INFO - 2022-04-25 12:25:15 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:15 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:15 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:15 --> URI Class Initialized
INFO - 2022-04-25 12:25:15 --> Router Class Initialized
INFO - 2022-04-25 12:25:15 --> Output Class Initialized
INFO - 2022-04-25 12:25:15 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:15 --> Input Class Initialized
INFO - 2022-04-25 12:25:15 --> Language Class Initialized
INFO - 2022-04-25 17:55:15 --> Loader Class Initialized
INFO - 2022-04-25 17:55:15 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:15 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:15 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:15 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:15 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:15 --> Upload Class Initialized
INFO - 2022-04-25 17:55:15 --> Table Class Initialized
INFO - 2022-04-25 17:55:15 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:15 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:15 --> Controller Class Initialized
INFO - 2022-04-25 17:55:15 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:15 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:15 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:15 --> Total execution time: 0.0034
INFO - 2022-04-25 12:25:16 --> Config Class Initialized
INFO - 2022-04-25 12:25:16 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:16 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:16 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:16 --> URI Class Initialized
INFO - 2022-04-25 12:25:16 --> Router Class Initialized
INFO - 2022-04-25 12:25:16 --> Output Class Initialized
INFO - 2022-04-25 12:25:16 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:16 --> Input Class Initialized
INFO - 2022-04-25 12:25:16 --> Language Class Initialized
INFO - 2022-04-25 17:55:16 --> Loader Class Initialized
INFO - 2022-04-25 17:55:16 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:16 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:16 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:16 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:16 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:16 --> Upload Class Initialized
INFO - 2022-04-25 17:55:16 --> Table Class Initialized
INFO - 2022-04-25 17:55:16 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:16 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:16 --> Controller Class Initialized
INFO - 2022-04-25 17:55:16 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:16 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:16 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:16 --> Total execution time: 0.0082
INFO - 2022-04-25 12:25:20 --> Config Class Initialized
INFO - 2022-04-25 12:25:20 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:20 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:20 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:20 --> URI Class Initialized
INFO - 2022-04-25 12:25:20 --> Router Class Initialized
INFO - 2022-04-25 12:25:20 --> Output Class Initialized
INFO - 2022-04-25 12:25:20 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:20 --> Input Class Initialized
INFO - 2022-04-25 12:25:20 --> Language Class Initialized
INFO - 2022-04-25 17:55:20 --> Loader Class Initialized
INFO - 2022-04-25 17:55:20 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:20 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:20 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:20 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:20 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:20 --> Upload Class Initialized
INFO - 2022-04-25 17:55:20 --> Table Class Initialized
INFO - 2022-04-25 17:55:20 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:20 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:20 --> Controller Class Initialized
INFO - 2022-04-25 17:55:20 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:20 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:20 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:20 --> Total execution time: 0.0082
INFO - 2022-04-25 12:25:22 --> Config Class Initialized
INFO - 2022-04-25 12:25:22 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:22 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:22 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:22 --> URI Class Initialized
INFO - 2022-04-25 12:25:22 --> Router Class Initialized
INFO - 2022-04-25 12:25:22 --> Output Class Initialized
INFO - 2022-04-25 12:25:22 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:22 --> Input Class Initialized
INFO - 2022-04-25 12:25:22 --> Language Class Initialized
INFO - 2022-04-25 17:55:22 --> Loader Class Initialized
INFO - 2022-04-25 17:55:22 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:22 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:22 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:22 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:22 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:22 --> Upload Class Initialized
INFO - 2022-04-25 17:55:22 --> Table Class Initialized
INFO - 2022-04-25 17:55:22 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:22 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:22 --> Controller Class Initialized
INFO - 2022-04-25 17:55:22 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:22 --> Model "Common_model" initialized
INFO - 2022-04-25 17:55:22 --> Final output sent to browser
DEBUG - 2022-04-25 17:55:22 --> Total execution time: 0.0073
INFO - 2022-04-25 12:25:36 --> Config Class Initialized
INFO - 2022-04-25 12:25:36 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:25:36 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:25:36 --> Utf8 Class Initialized
INFO - 2022-04-25 12:25:36 --> URI Class Initialized
INFO - 2022-04-25 12:25:36 --> Router Class Initialized
INFO - 2022-04-25 12:25:36 --> Output Class Initialized
INFO - 2022-04-25 12:25:36 --> Security Class Initialized
DEBUG - 2022-04-25 12:25:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:25:36 --> Input Class Initialized
INFO - 2022-04-25 12:25:36 --> Language Class Initialized
INFO - 2022-04-25 17:55:36 --> Loader Class Initialized
INFO - 2022-04-25 17:55:36 --> Helper loaded: url_helper
INFO - 2022-04-25 17:55:36 --> Helper loaded: file_helper
INFO - 2022-04-25 17:55:36 --> Helper loaded: genral_helper
INFO - 2022-04-25 17:55:36 --> Database Driver Class Initialized
DEBUG - 2022-04-25 17:55:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 17:55:36 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 17:55:36 --> Upload Class Initialized
INFO - 2022-04-25 17:55:36 --> Table Class Initialized
INFO - 2022-04-25 17:55:36 --> Helper loaded: form_helper
INFO - 2022-04-25 17:55:36 --> Form Validation Class Initialized
INFO - 2022-04-25 17:55:36 --> Controller Class Initialized
INFO - 2022-04-25 17:55:36 --> Model "Api_model" initialized
INFO - 2022-04-25 17:55:36 --> Model "Common_model" initialized
INFO - 2022-04-25 12:32:34 --> Config Class Initialized
INFO - 2022-04-25 12:32:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:32:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:32:34 --> Utf8 Class Initialized
INFO - 2022-04-25 12:32:34 --> URI Class Initialized
INFO - 2022-04-25 12:32:34 --> Router Class Initialized
INFO - 2022-04-25 12:32:34 --> Output Class Initialized
INFO - 2022-04-25 12:32:34 --> Security Class Initialized
DEBUG - 2022-04-25 12:32:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:32:34 --> Input Class Initialized
INFO - 2022-04-25 12:32:34 --> Language Class Initialized
INFO - 2022-04-25 18:02:34 --> Loader Class Initialized
INFO - 2022-04-25 18:02:34 --> Helper loaded: url_helper
INFO - 2022-04-25 18:02:34 --> Helper loaded: file_helper
INFO - 2022-04-25 18:02:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:02:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:02:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:02:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:02:34 --> Upload Class Initialized
INFO - 2022-04-25 18:02:34 --> Table Class Initialized
INFO - 2022-04-25 18:02:34 --> Helper loaded: form_helper
INFO - 2022-04-25 18:02:34 --> Form Validation Class Initialized
INFO - 2022-04-25 18:02:34 --> Controller Class Initialized
INFO - 2022-04-25 18:02:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 18:02:34 --> Model "Common_model" initialized
INFO - 2022-04-25 18:02:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/header.php
INFO - 2022-04-25 18:02:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/sidebar.php
INFO - 2022-04-25 18:02:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/medicines/medicine_list.php
INFO - 2022-04-25 18:02:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/footer.php
INFO - 2022-04-25 18:02:34 --> Final output sent to browser
DEBUG - 2022-04-25 18:02:34 --> Total execution time: 0.0161
INFO - 2022-04-25 12:32:34 --> Config Class Initialized
INFO - 2022-04-25 12:32:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:32:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:32:34 --> Utf8 Class Initialized
INFO - 2022-04-25 12:32:34 --> URI Class Initialized
INFO - 2022-04-25 12:32:34 --> Router Class Initialized
INFO - 2022-04-25 12:32:34 --> Output Class Initialized
INFO - 2022-04-25 12:32:34 --> Security Class Initialized
DEBUG - 2022-04-25 12:32:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:32:34 --> Input Class Initialized
INFO - 2022-04-25 12:32:34 --> Language Class Initialized
INFO - 2022-04-25 18:02:34 --> Loader Class Initialized
INFO - 2022-04-25 18:02:34 --> Helper loaded: url_helper
INFO - 2022-04-25 18:02:34 --> Helper loaded: file_helper
INFO - 2022-04-25 18:02:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:02:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:02:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:02:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:02:34 --> Upload Class Initialized
INFO - 2022-04-25 18:02:34 --> Table Class Initialized
INFO - 2022-04-25 18:02:34 --> Helper loaded: form_helper
INFO - 2022-04-25 18:02:34 --> Form Validation Class Initialized
INFO - 2022-04-25 18:02:34 --> Controller Class Initialized
INFO - 2022-04-25 18:02:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 18:02:34 --> Model "Common_model" initialized
INFO - 2022-04-25 18:02:34 --> Final output sent to browser
DEBUG - 2022-04-25 18:02:34 --> Total execution time: 0.0198
INFO - 2022-04-25 12:32:45 --> Config Class Initialized
INFO - 2022-04-25 12:32:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:32:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:32:45 --> Utf8 Class Initialized
INFO - 2022-04-25 12:32:45 --> URI Class Initialized
INFO - 2022-04-25 12:32:45 --> Router Class Initialized
INFO - 2022-04-25 12:32:45 --> Output Class Initialized
INFO - 2022-04-25 12:32:45 --> Security Class Initialized
DEBUG - 2022-04-25 12:32:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:32:45 --> Input Class Initialized
INFO - 2022-04-25 12:32:45 --> Language Class Initialized
INFO - 2022-04-25 18:02:45 --> Loader Class Initialized
INFO - 2022-04-25 18:02:45 --> Helper loaded: url_helper
INFO - 2022-04-25 18:02:45 --> Helper loaded: file_helper
INFO - 2022-04-25 18:02:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:02:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:02:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:02:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:02:45 --> Upload Class Initialized
INFO - 2022-04-25 18:02:45 --> Table Class Initialized
INFO - 2022-04-25 18:02:45 --> Helper loaded: form_helper
INFO - 2022-04-25 18:02:45 --> Form Validation Class Initialized
INFO - 2022-04-25 18:02:45 --> Controller Class Initialized
INFO - 2022-04-25 18:02:45 --> Model "Medicine_model" initialized
INFO - 2022-04-25 18:02:45 --> Model "Common_model" initialized
INFO - 2022-04-25 18:02:45 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/header.php
INFO - 2022-04-25 18:02:45 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/sidebar.php
INFO - 2022-04-25 18:02:45 --> File loaded: /home/athealcpanel/public_html/application/views/partner/medicines/medicine_list.php
INFO - 2022-04-25 18:02:45 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/footer.php
INFO - 2022-04-25 18:02:45 --> Final output sent to browser
DEBUG - 2022-04-25 18:02:45 --> Total execution time: 0.0133
INFO - 2022-04-25 12:32:45 --> Config Class Initialized
INFO - 2022-04-25 12:32:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:32:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:32:45 --> Utf8 Class Initialized
INFO - 2022-04-25 12:32:45 --> URI Class Initialized
INFO - 2022-04-25 12:32:45 --> Router Class Initialized
INFO - 2022-04-25 12:32:45 --> Output Class Initialized
INFO - 2022-04-25 12:32:45 --> Security Class Initialized
DEBUG - 2022-04-25 12:32:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:32:45 --> Input Class Initialized
INFO - 2022-04-25 12:32:45 --> Language Class Initialized
INFO - 2022-04-25 18:02:45 --> Loader Class Initialized
INFO - 2022-04-25 18:02:45 --> Helper loaded: url_helper
INFO - 2022-04-25 18:02:45 --> Helper loaded: file_helper
INFO - 2022-04-25 18:02:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:02:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:02:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:02:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:02:45 --> Upload Class Initialized
INFO - 2022-04-25 18:02:45 --> Table Class Initialized
INFO - 2022-04-25 18:02:45 --> Helper loaded: form_helper
INFO - 2022-04-25 18:02:45 --> Form Validation Class Initialized
INFO - 2022-04-25 18:02:45 --> Controller Class Initialized
INFO - 2022-04-25 18:02:45 --> Model "Medicine_model" initialized
INFO - 2022-04-25 18:02:45 --> Model "Common_model" initialized
INFO - 2022-04-25 18:02:45 --> Final output sent to browser
DEBUG - 2022-04-25 18:02:45 --> Total execution time: 0.0253
INFO - 2022-04-25 12:34:02 --> Config Class Initialized
INFO - 2022-04-25 12:34:02 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:02 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:02 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:02 --> URI Class Initialized
INFO - 2022-04-25 12:34:02 --> Router Class Initialized
INFO - 2022-04-25 12:34:02 --> Output Class Initialized
INFO - 2022-04-25 12:34:02 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:02 --> Input Class Initialized
INFO - 2022-04-25 12:34:02 --> Language Class Initialized
INFO - 2022-04-25 18:04:02 --> Loader Class Initialized
INFO - 2022-04-25 18:04:02 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:02 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:02 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:02 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:02 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:02 --> Upload Class Initialized
INFO - 2022-04-25 18:04:02 --> Table Class Initialized
INFO - 2022-04-25 18:04:02 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:02 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:02 --> Controller Class Initialized
INFO - 2022-04-25 18:04:02 --> Model "Vendor_model" initialized
INFO - 2022-04-25 12:34:02 --> Config Class Initialized
INFO - 2022-04-25 12:34:02 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:02 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:02 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:02 --> URI Class Initialized
DEBUG - 2022-04-25 12:34:02 --> No URI present. Default controller set.
INFO - 2022-04-25 12:34:02 --> Router Class Initialized
INFO - 2022-04-25 12:34:02 --> Output Class Initialized
INFO - 2022-04-25 12:34:02 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:02 --> Input Class Initialized
INFO - 2022-04-25 12:34:02 --> Language Class Initialized
INFO - 2022-04-25 18:04:02 --> Loader Class Initialized
INFO - 2022-04-25 18:04:02 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:02 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:02 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:02 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:02 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:02 --> Upload Class Initialized
INFO - 2022-04-25 18:04:02 --> Table Class Initialized
INFO - 2022-04-25 18:04:02 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:02 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:02 --> Controller Class Initialized
INFO - 2022-04-25 18:04:02 --> Model "Banner_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Doctors_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Features_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Speciality_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Admin_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Social_media_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Services_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Doctors_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Video_model" initialized
INFO - 2022-04-25 18:04:02 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 18:04:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 18:04:02 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:02 --> Total execution time: 0.0075
INFO - 2022-04-25 12:34:07 --> Config Class Initialized
INFO - 2022-04-25 12:34:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:07 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:07 --> URI Class Initialized
INFO - 2022-04-25 12:34:07 --> Router Class Initialized
INFO - 2022-04-25 12:34:07 --> Output Class Initialized
INFO - 2022-04-25 12:34:07 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:07 --> Input Class Initialized
INFO - 2022-04-25 12:34:07 --> Language Class Initialized
INFO - 2022-04-25 18:04:07 --> Loader Class Initialized
INFO - 2022-04-25 18:04:07 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:07 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:07 --> Upload Class Initialized
INFO - 2022-04-25 18:04:07 --> Table Class Initialized
INFO - 2022-04-25 18:04:07 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:07 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:07 --> Controller Class Initialized
INFO - 2022-04-25 18:04:07 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:07 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:07 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:07 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:07 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:07 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:07 --> Total execution time: 0.0140
INFO - 2022-04-25 12:34:28 --> Config Class Initialized
INFO - 2022-04-25 12:34:28 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:28 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:28 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:28 --> URI Class Initialized
INFO - 2022-04-25 12:34:28 --> Router Class Initialized
INFO - 2022-04-25 12:34:28 --> Output Class Initialized
INFO - 2022-04-25 12:34:28 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:28 --> Input Class Initialized
INFO - 2022-04-25 12:34:28 --> Language Class Initialized
INFO - 2022-04-25 12:34:28 --> Loader Class Initialized
INFO - 2022-04-25 12:34:28 --> Helper loaded: url_helper
INFO - 2022-04-25 12:34:28 --> Helper loaded: file_helper
INFO - 2022-04-25 12:34:28 --> Helper loaded: genral_helper
INFO - 2022-04-25 12:34:28 --> Database Driver Class Initialized
DEBUG - 2022-04-25 12:34:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 12:34:28 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 12:34:28 --> Upload Class Initialized
INFO - 2022-04-25 12:34:28 --> Table Class Initialized
INFO - 2022-04-25 12:34:28 --> Helper loaded: form_helper
INFO - 2022-04-25 12:34:28 --> Form Validation Class Initialized
INFO - 2022-04-25 12:34:28 --> Controller Class Initialized
INFO - 2022-04-25 12:34:28 --> Model "Admin_model" initialized
DEBUG - 2022-04-25 12:34:28 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2022-04-25 12:34:28 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 12:34:28 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 12:34:28 --> File loaded: /home/athealcpanel/public_html/application/views/admin/setting/appsetting.php
INFO - 2022-04-25 12:34:28 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 12:34:28 --> Final output sent to browser
DEBUG - 2022-04-25 12:34:28 --> Total execution time: 0.0076
INFO - 2022-04-25 12:34:32 --> Config Class Initialized
INFO - 2022-04-25 12:34:32 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:32 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:32 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:32 --> URI Class Initialized
INFO - 2022-04-25 12:34:32 --> Router Class Initialized
INFO - 2022-04-25 12:34:32 --> Output Class Initialized
INFO - 2022-04-25 12:34:32 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:32 --> Input Class Initialized
INFO - 2022-04-25 12:34:32 --> Language Class Initialized
INFO - 2022-04-25 12:34:32 --> Loader Class Initialized
INFO - 2022-04-25 12:34:32 --> Helper loaded: url_helper
INFO - 2022-04-25 12:34:32 --> Helper loaded: file_helper
INFO - 2022-04-25 12:34:32 --> Helper loaded: genral_helper
INFO - 2022-04-25 12:34:32 --> Database Driver Class Initialized
DEBUG - 2022-04-25 12:34:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 12:34:32 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 12:34:32 --> Upload Class Initialized
INFO - 2022-04-25 12:34:32 --> Table Class Initialized
INFO - 2022-04-25 12:34:32 --> Helper loaded: form_helper
INFO - 2022-04-25 12:34:32 --> Form Validation Class Initialized
INFO - 2022-04-25 12:34:32 --> Controller Class Initialized
INFO - 2022-04-25 12:34:32 --> Model "Admin_model" initialized
DEBUG - 2022-04-25 12:34:32 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2022-04-25 12:34:32 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2022-04-25 12:34:32 --> Model "Common_model" initialized
INFO - 2022-04-25 12:34:32 --> Config Class Initialized
INFO - 2022-04-25 12:34:32 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:32 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:32 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:32 --> URI Class Initialized
INFO - 2022-04-25 12:34:32 --> Router Class Initialized
INFO - 2022-04-25 12:34:32 --> Output Class Initialized
INFO - 2022-04-25 12:34:32 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:32 --> Input Class Initialized
INFO - 2022-04-25 12:34:32 --> Language Class Initialized
INFO - 2022-04-25 12:34:32 --> Loader Class Initialized
INFO - 2022-04-25 12:34:32 --> Helper loaded: url_helper
INFO - 2022-04-25 12:34:32 --> Helper loaded: file_helper
INFO - 2022-04-25 12:34:32 --> Helper loaded: genral_helper
INFO - 2022-04-25 12:34:32 --> Database Driver Class Initialized
DEBUG - 2022-04-25 12:34:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 12:34:32 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 12:34:32 --> Upload Class Initialized
INFO - 2022-04-25 12:34:32 --> Table Class Initialized
INFO - 2022-04-25 12:34:32 --> Helper loaded: form_helper
INFO - 2022-04-25 12:34:32 --> Form Validation Class Initialized
INFO - 2022-04-25 12:34:32 --> Controller Class Initialized
INFO - 2022-04-25 12:34:32 --> Model "Admin_model" initialized
DEBUG - 2022-04-25 12:34:32 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2022-04-25 12:34:32 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 12:34:32 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 12:34:32 --> File loaded: /home/athealcpanel/public_html/application/views/admin/setting/appsetting.php
INFO - 2022-04-25 12:34:32 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 12:34:32 --> Final output sent to browser
DEBUG - 2022-04-25 12:34:32 --> Total execution time: 0.0062
INFO - 2022-04-25 12:34:37 --> Config Class Initialized
INFO - 2022-04-25 12:34:37 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:37 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:37 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:37 --> URI Class Initialized
INFO - 2022-04-25 12:34:37 --> Router Class Initialized
INFO - 2022-04-25 12:34:37 --> Output Class Initialized
INFO - 2022-04-25 12:34:37 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:37 --> Input Class Initialized
INFO - 2022-04-25 12:34:37 --> Language Class Initialized
INFO - 2022-04-25 18:04:37 --> Loader Class Initialized
INFO - 2022-04-25 18:04:37 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:37 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:37 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:37 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:37 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:37 --> Upload Class Initialized
INFO - 2022-04-25 18:04:37 --> Table Class Initialized
INFO - 2022-04-25 18:04:37 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:37 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:37 --> Controller Class Initialized
INFO - 2022-04-25 18:04:37 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:37 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:37 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:37 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:37 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:37 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:37 --> Total execution time: 0.0136
INFO - 2022-04-25 12:34:42 --> Config Class Initialized
INFO - 2022-04-25 12:34:42 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:42 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:42 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:42 --> URI Class Initialized
INFO - 2022-04-25 12:34:42 --> Router Class Initialized
INFO - 2022-04-25 12:34:42 --> Output Class Initialized
INFO - 2022-04-25 12:34:42 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:42 --> Input Class Initialized
INFO - 2022-04-25 12:34:42 --> Language Class Initialized
INFO - 2022-04-25 18:04:42 --> Loader Class Initialized
INFO - 2022-04-25 18:04:42 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:42 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:42 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:42 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:42 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:42 --> Upload Class Initialized
INFO - 2022-04-25 18:04:42 --> Table Class Initialized
INFO - 2022-04-25 18:04:42 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:42 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:42 --> Controller Class Initialized
INFO - 2022-04-25 18:04:42 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:42 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:42 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:42 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:42 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:42 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:42 --> Total execution time: 0.0074
INFO - 2022-04-25 12:34:45 --> Config Class Initialized
INFO - 2022-04-25 12:34:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:45 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:45 --> URI Class Initialized
INFO - 2022-04-25 12:34:45 --> Router Class Initialized
INFO - 2022-04-25 12:34:45 --> Output Class Initialized
INFO - 2022-04-25 12:34:45 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:45 --> Input Class Initialized
INFO - 2022-04-25 12:34:45 --> Language Class Initialized
INFO - 2022-04-25 18:04:45 --> Loader Class Initialized
INFO - 2022-04-25 18:04:45 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:45 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:45 --> Upload Class Initialized
INFO - 2022-04-25 18:04:45 --> Table Class Initialized
INFO - 2022-04-25 18:04:45 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:45 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:45 --> Controller Class Initialized
INFO - 2022-04-25 18:04:45 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:45 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:45 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:45 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:45 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:45 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:45 --> Total execution time: 0.0067
INFO - 2022-04-25 12:34:46 --> Config Class Initialized
INFO - 2022-04-25 12:34:46 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:46 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:46 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:46 --> URI Class Initialized
INFO - 2022-04-25 12:34:46 --> Router Class Initialized
INFO - 2022-04-25 12:34:46 --> Output Class Initialized
INFO - 2022-04-25 12:34:46 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:46 --> Input Class Initialized
INFO - 2022-04-25 12:34:46 --> Language Class Initialized
INFO - 2022-04-25 18:04:46 --> Loader Class Initialized
INFO - 2022-04-25 18:04:46 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:46 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:46 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:46 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:46 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:46 --> Upload Class Initialized
INFO - 2022-04-25 18:04:46 --> Table Class Initialized
INFO - 2022-04-25 18:04:46 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:46 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:46 --> Controller Class Initialized
INFO - 2022-04-25 18:04:46 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:46 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:46 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:46 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:46 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:46 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:46 --> Total execution time: 0.0059
INFO - 2022-04-25 12:34:48 --> Config Class Initialized
INFO - 2022-04-25 12:34:48 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:48 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:48 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:48 --> URI Class Initialized
INFO - 2022-04-25 12:34:48 --> Router Class Initialized
INFO - 2022-04-25 12:34:48 --> Output Class Initialized
INFO - 2022-04-25 12:34:48 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:48 --> Input Class Initialized
INFO - 2022-04-25 12:34:48 --> Language Class Initialized
INFO - 2022-04-25 18:04:48 --> Loader Class Initialized
INFO - 2022-04-25 18:04:48 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:48 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:48 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:48 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:48 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:48 --> Upload Class Initialized
INFO - 2022-04-25 18:04:48 --> Table Class Initialized
INFO - 2022-04-25 18:04:48 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:48 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:48 --> Controller Class Initialized
INFO - 2022-04-25 18:04:48 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:48 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:49 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:49 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:49 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:49 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:49 --> Total execution time: 0.0063
INFO - 2022-04-25 12:34:51 --> Config Class Initialized
INFO - 2022-04-25 12:34:51 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:51 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:51 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:51 --> URI Class Initialized
INFO - 2022-04-25 12:34:51 --> Router Class Initialized
INFO - 2022-04-25 12:34:51 --> Output Class Initialized
INFO - 2022-04-25 12:34:51 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:51 --> Input Class Initialized
INFO - 2022-04-25 12:34:51 --> Language Class Initialized
INFO - 2022-04-25 18:04:51 --> Loader Class Initialized
INFO - 2022-04-25 18:04:51 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:51 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:51 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:51 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:51 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:51 --> Upload Class Initialized
INFO - 2022-04-25 18:04:51 --> Table Class Initialized
INFO - 2022-04-25 18:04:51 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:51 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:51 --> Controller Class Initialized
INFO - 2022-04-25 18:04:51 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:51 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:51 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:51 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:51 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:51 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:51 --> Total execution time: 0.0074
INFO - 2022-04-25 12:34:53 --> Config Class Initialized
INFO - 2022-04-25 12:34:53 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:53 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:53 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:53 --> URI Class Initialized
INFO - 2022-04-25 12:34:53 --> Router Class Initialized
INFO - 2022-04-25 12:34:53 --> Output Class Initialized
INFO - 2022-04-25 12:34:53 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:53 --> Input Class Initialized
INFO - 2022-04-25 12:34:53 --> Language Class Initialized
INFO - 2022-04-25 18:04:53 --> Loader Class Initialized
INFO - 2022-04-25 18:04:53 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:53 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:53 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:53 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:53 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:53 --> Upload Class Initialized
INFO - 2022-04-25 18:04:53 --> Table Class Initialized
INFO - 2022-04-25 18:04:53 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:53 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:53 --> Controller Class Initialized
INFO - 2022-04-25 18:04:53 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:53 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:53 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:53 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:53 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:53 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:53 --> Total execution time: 0.0072
INFO - 2022-04-25 12:34:56 --> Config Class Initialized
INFO - 2022-04-25 12:34:56 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:56 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:56 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:56 --> URI Class Initialized
INFO - 2022-04-25 12:34:56 --> Router Class Initialized
INFO - 2022-04-25 12:34:56 --> Output Class Initialized
INFO - 2022-04-25 12:34:56 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:56 --> Input Class Initialized
INFO - 2022-04-25 12:34:56 --> Language Class Initialized
INFO - 2022-04-25 18:04:56 --> Loader Class Initialized
INFO - 2022-04-25 18:04:56 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:56 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:56 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:56 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:56 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:56 --> Upload Class Initialized
INFO - 2022-04-25 18:04:56 --> Table Class Initialized
INFO - 2022-04-25 18:04:56 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:56 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:56 --> Controller Class Initialized
INFO - 2022-04-25 18:04:56 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:56 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:56 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:56 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:56 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:56 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:56 --> Total execution time: 0.0069
INFO - 2022-04-25 12:34:58 --> Config Class Initialized
INFO - 2022-04-25 12:34:58 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:34:58 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:34:58 --> Utf8 Class Initialized
INFO - 2022-04-25 12:34:58 --> URI Class Initialized
INFO - 2022-04-25 12:34:58 --> Router Class Initialized
INFO - 2022-04-25 12:34:58 --> Output Class Initialized
INFO - 2022-04-25 12:34:58 --> Security Class Initialized
DEBUG - 2022-04-25 12:34:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:34:58 --> Input Class Initialized
INFO - 2022-04-25 12:34:58 --> Language Class Initialized
INFO - 2022-04-25 18:04:58 --> Loader Class Initialized
INFO - 2022-04-25 18:04:58 --> Helper loaded: url_helper
INFO - 2022-04-25 18:04:58 --> Helper loaded: file_helper
INFO - 2022-04-25 18:04:58 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:04:58 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:04:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:04:58 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:04:58 --> Upload Class Initialized
INFO - 2022-04-25 18:04:58 --> Table Class Initialized
INFO - 2022-04-25 18:04:58 --> Helper loaded: form_helper
INFO - 2022-04-25 18:04:58 --> Form Validation Class Initialized
INFO - 2022-04-25 18:04:58 --> Controller Class Initialized
INFO - 2022-04-25 18:04:58 --> Model "Vendor_model" initialized
INFO - 2022-04-25 18:04:58 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/header.php
INFO - 2022-04-25 18:04:58 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/sidebar.php
INFO - 2022-04-25 18:04:58 --> File loaded: /home/athealcpanel/public_html/application/views/admin/vendor/vendor_list.php
INFO - 2022-04-25 18:04:58 --> File loaded: /home/athealcpanel/public_html/application/views/admin/template/footer.php
INFO - 2022-04-25 18:04:58 --> Final output sent to browser
DEBUG - 2022-04-25 18:04:58 --> Total execution time: 0.0074
INFO - 2022-04-25 12:35:07 --> Config Class Initialized
INFO - 2022-04-25 12:35:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 12:35:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 12:35:07 --> Utf8 Class Initialized
INFO - 2022-04-25 12:35:07 --> URI Class Initialized
DEBUG - 2022-04-25 12:35:07 --> No URI present. Default controller set.
INFO - 2022-04-25 12:35:07 --> Router Class Initialized
INFO - 2022-04-25 12:35:07 --> Output Class Initialized
INFO - 2022-04-25 12:35:07 --> Security Class Initialized
DEBUG - 2022-04-25 12:35:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 12:35:07 --> Input Class Initialized
INFO - 2022-04-25 12:35:07 --> Language Class Initialized
INFO - 2022-04-25 18:05:07 --> Loader Class Initialized
INFO - 2022-04-25 18:05:07 --> Helper loaded: url_helper
INFO - 2022-04-25 18:05:07 --> Helper loaded: file_helper
INFO - 2022-04-25 18:05:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:05:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:05:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:05:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:05:07 --> Upload Class Initialized
INFO - 2022-04-25 18:05:07 --> Table Class Initialized
INFO - 2022-04-25 18:05:07 --> Helper loaded: form_helper
INFO - 2022-04-25 18:05:07 --> Form Validation Class Initialized
INFO - 2022-04-25 18:05:07 --> Controller Class Initialized
INFO - 2022-04-25 18:05:07 --> Model "Banner_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Features_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Speciality_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Admin_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Social_media_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Services_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Video_model" initialized
INFO - 2022-04-25 18:05:07 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 18:05:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 18:05:07 --> Final output sent to browser
DEBUG - 2022-04-25 18:05:07 --> Total execution time: 0.0060
INFO - 2022-04-25 13:12:52 --> Config Class Initialized
INFO - 2022-04-25 13:12:52 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:12:52 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:12:52 --> Utf8 Class Initialized
INFO - 2022-04-25 13:12:52 --> URI Class Initialized
INFO - 2022-04-25 13:12:52 --> Router Class Initialized
INFO - 2022-04-25 13:12:52 --> Output Class Initialized
INFO - 2022-04-25 13:12:52 --> Security Class Initialized
DEBUG - 2022-04-25 13:12:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:12:52 --> Input Class Initialized
INFO - 2022-04-25 13:12:52 --> Language Class Initialized
INFO - 2022-04-25 18:42:52 --> Loader Class Initialized
INFO - 2022-04-25 18:42:52 --> Helper loaded: url_helper
INFO - 2022-04-25 18:42:52 --> Helper loaded: file_helper
INFO - 2022-04-25 18:42:52 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:42:52 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:42:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:42:52 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:42:52 --> Upload Class Initialized
INFO - 2022-04-25 18:42:52 --> Table Class Initialized
INFO - 2022-04-25 18:42:52 --> Helper loaded: form_helper
INFO - 2022-04-25 18:42:52 --> Form Validation Class Initialized
INFO - 2022-04-25 18:42:52 --> Controller Class Initialized
INFO - 2022-04-25 18:42:52 --> Model "Api_model" initialized
INFO - 2022-04-25 18:42:52 --> Model "Common_model" initialized
INFO - 2022-04-25 18:42:52 --> Final output sent to browser
DEBUG - 2022-04-25 18:42:52 --> Total execution time: 0.0073
INFO - 2022-04-25 13:12:52 --> Config Class Initialized
INFO - 2022-04-25 13:12:52 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:12:52 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:12:52 --> Utf8 Class Initialized
INFO - 2022-04-25 13:12:52 --> URI Class Initialized
INFO - 2022-04-25 13:12:52 --> Router Class Initialized
INFO - 2022-04-25 13:12:52 --> Output Class Initialized
INFO - 2022-04-25 13:12:52 --> Security Class Initialized
DEBUG - 2022-04-25 13:12:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:12:52 --> Input Class Initialized
INFO - 2022-04-25 13:12:52 --> Language Class Initialized
INFO - 2022-04-25 18:42:52 --> Loader Class Initialized
INFO - 2022-04-25 18:42:52 --> Helper loaded: url_helper
INFO - 2022-04-25 18:42:52 --> Helper loaded: file_helper
INFO - 2022-04-25 18:42:52 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:42:52 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:42:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:42:52 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:42:52 --> Upload Class Initialized
INFO - 2022-04-25 18:42:52 --> Table Class Initialized
INFO - 2022-04-25 18:42:52 --> Helper loaded: form_helper
INFO - 2022-04-25 18:42:52 --> Form Validation Class Initialized
INFO - 2022-04-25 18:42:52 --> Controller Class Initialized
INFO - 2022-04-25 18:42:52 --> Model "Api_model" initialized
INFO - 2022-04-25 18:42:52 --> Model "Common_model" initialized
INFO - 2022-04-25 18:42:52 --> Final output sent to browser
DEBUG - 2022-04-25 18:42:52 --> Total execution time: 0.0033
INFO - 2022-04-25 13:12:53 --> Config Class Initialized
INFO - 2022-04-25 13:12:53 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:12:53 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:12:53 --> Utf8 Class Initialized
INFO - 2022-04-25 13:12:53 --> URI Class Initialized
INFO - 2022-04-25 13:12:53 --> Router Class Initialized
INFO - 2022-04-25 13:12:53 --> Output Class Initialized
INFO - 2022-04-25 13:12:53 --> Security Class Initialized
DEBUG - 2022-04-25 13:12:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:12:53 --> Input Class Initialized
INFO - 2022-04-25 13:12:53 --> Language Class Initialized
INFO - 2022-04-25 18:42:53 --> Loader Class Initialized
INFO - 2022-04-25 18:42:53 --> Helper loaded: url_helper
INFO - 2022-04-25 18:42:53 --> Helper loaded: file_helper
INFO - 2022-04-25 18:42:53 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:42:53 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:42:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:42:53 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:42:53 --> Upload Class Initialized
INFO - 2022-04-25 18:42:53 --> Table Class Initialized
INFO - 2022-04-25 18:42:53 --> Helper loaded: form_helper
INFO - 2022-04-25 18:42:53 --> Form Validation Class Initialized
INFO - 2022-04-25 18:42:53 --> Controller Class Initialized
INFO - 2022-04-25 18:42:53 --> Model "Api_model" initialized
INFO - 2022-04-25 18:42:53 --> Model "Common_model" initialized
INFO - 2022-04-25 18:42:53 --> Final output sent to browser
DEBUG - 2022-04-25 18:42:53 --> Total execution time: 0.0029
INFO - 2022-04-25 13:13:00 --> Config Class Initialized
INFO - 2022-04-25 13:13:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:00 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:00 --> URI Class Initialized
INFO - 2022-04-25 13:13:00 --> Router Class Initialized
INFO - 2022-04-25 13:13:00 --> Output Class Initialized
INFO - 2022-04-25 13:13:00 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:00 --> Input Class Initialized
INFO - 2022-04-25 13:13:00 --> Language Class Initialized
INFO - 2022-04-25 18:43:00 --> Loader Class Initialized
INFO - 2022-04-25 18:43:00 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:00 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:00 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:00 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:00 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:00 --> Upload Class Initialized
INFO - 2022-04-25 18:43:00 --> Table Class Initialized
INFO - 2022-04-25 18:43:00 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:00 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:00 --> Controller Class Initialized
INFO - 2022-04-25 18:43:00 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:00 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:00 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:00 --> Total execution time: 0.0036
INFO - 2022-04-25 13:13:00 --> Config Class Initialized
INFO - 2022-04-25 13:13:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:00 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:00 --> URI Class Initialized
INFO - 2022-04-25 13:13:00 --> Router Class Initialized
INFO - 2022-04-25 13:13:00 --> Output Class Initialized
INFO - 2022-04-25 13:13:00 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:00 --> Input Class Initialized
INFO - 2022-04-25 13:13:00 --> Language Class Initialized
INFO - 2022-04-25 18:43:00 --> Loader Class Initialized
INFO - 2022-04-25 18:43:00 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:00 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:00 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:00 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:00 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:00 --> Upload Class Initialized
INFO - 2022-04-25 18:43:00 --> Table Class Initialized
INFO - 2022-04-25 18:43:00 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:00 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:00 --> Controller Class Initialized
INFO - 2022-04-25 18:43:00 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:00 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:00 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:00 --> Total execution time: 0.0032
INFO - 2022-04-25 13:13:02 --> Config Class Initialized
INFO - 2022-04-25 13:13:02 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:02 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:02 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:02 --> URI Class Initialized
INFO - 2022-04-25 13:13:02 --> Router Class Initialized
INFO - 2022-04-25 13:13:02 --> Output Class Initialized
INFO - 2022-04-25 13:13:02 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:02 --> Input Class Initialized
INFO - 2022-04-25 13:13:02 --> Language Class Initialized
INFO - 2022-04-25 18:43:02 --> Loader Class Initialized
INFO - 2022-04-25 18:43:02 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:02 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:02 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:02 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:02 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:02 --> Upload Class Initialized
INFO - 2022-04-25 18:43:02 --> Table Class Initialized
INFO - 2022-04-25 18:43:02 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:02 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:02 --> Controller Class Initialized
INFO - 2022-04-25 18:43:02 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:02 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:02 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:02 --> Total execution time: 0.0132
INFO - 2022-04-25 13:13:07 --> Config Class Initialized
INFO - 2022-04-25 13:13:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:07 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:07 --> URI Class Initialized
INFO - 2022-04-25 13:13:07 --> Router Class Initialized
INFO - 2022-04-25 13:13:07 --> Output Class Initialized
INFO - 2022-04-25 13:13:07 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:07 --> Input Class Initialized
INFO - 2022-04-25 13:13:07 --> Language Class Initialized
INFO - 2022-04-25 18:43:07 --> Loader Class Initialized
INFO - 2022-04-25 18:43:07 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:07 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:07 --> Upload Class Initialized
INFO - 2022-04-25 18:43:07 --> Table Class Initialized
INFO - 2022-04-25 18:43:07 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:07 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:07 --> Controller Class Initialized
INFO - 2022-04-25 18:43:07 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:07 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:07 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:07 --> Total execution time: 0.0061
INFO - 2022-04-25 13:13:26 --> Config Class Initialized
INFO - 2022-04-25 13:13:26 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:26 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:26 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:26 --> URI Class Initialized
INFO - 2022-04-25 13:13:26 --> Router Class Initialized
INFO - 2022-04-25 13:13:26 --> Output Class Initialized
INFO - 2022-04-25 13:13:26 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:26 --> Input Class Initialized
INFO - 2022-04-25 13:13:26 --> Language Class Initialized
INFO - 2022-04-25 18:43:26 --> Loader Class Initialized
INFO - 2022-04-25 18:43:26 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:26 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:26 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:26 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:26 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:26 --> Upload Class Initialized
INFO - 2022-04-25 18:43:26 --> Table Class Initialized
INFO - 2022-04-25 18:43:26 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:26 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:26 --> Controller Class Initialized
INFO - 2022-04-25 18:43:26 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:26 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:26 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:26 --> Total execution time: 0.0172
INFO - 2022-04-25 13:13:29 --> Config Class Initialized
INFO - 2022-04-25 13:13:29 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:29 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:29 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:29 --> URI Class Initialized
INFO - 2022-04-25 13:13:29 --> Router Class Initialized
INFO - 2022-04-25 13:13:29 --> Output Class Initialized
INFO - 2022-04-25 13:13:29 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:29 --> Input Class Initialized
INFO - 2022-04-25 13:13:29 --> Language Class Initialized
INFO - 2022-04-25 18:43:29 --> Loader Class Initialized
INFO - 2022-04-25 18:43:29 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:29 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:29 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:29 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:29 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:29 --> Upload Class Initialized
INFO - 2022-04-25 18:43:29 --> Table Class Initialized
INFO - 2022-04-25 18:43:29 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:29 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:29 --> Controller Class Initialized
INFO - 2022-04-25 18:43:29 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:29 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:29 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:29 --> Total execution time: 0.0070
INFO - 2022-04-25 13:13:41 --> Config Class Initialized
INFO - 2022-04-25 13:13:41 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:41 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:41 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:41 --> URI Class Initialized
INFO - 2022-04-25 13:13:41 --> Router Class Initialized
INFO - 2022-04-25 13:13:41 --> Output Class Initialized
INFO - 2022-04-25 13:13:41 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:41 --> Input Class Initialized
INFO - 2022-04-25 13:13:41 --> Language Class Initialized
INFO - 2022-04-25 18:43:41 --> Loader Class Initialized
INFO - 2022-04-25 18:43:41 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:41 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:41 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:41 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:41 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:41 --> Upload Class Initialized
INFO - 2022-04-25 18:43:41 --> Table Class Initialized
INFO - 2022-04-25 18:43:41 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:41 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:41 --> Controller Class Initialized
INFO - 2022-04-25 18:43:41 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:41 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:41 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:41 --> Total execution time: 0.0081
INFO - 2022-04-25 13:13:41 --> Config Class Initialized
INFO - 2022-04-25 13:13:41 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:41 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:41 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:41 --> URI Class Initialized
INFO - 2022-04-25 13:13:41 --> Router Class Initialized
INFO - 2022-04-25 13:13:41 --> Output Class Initialized
INFO - 2022-04-25 13:13:41 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:41 --> Input Class Initialized
INFO - 2022-04-25 13:13:41 --> Language Class Initialized
INFO - 2022-04-25 18:43:41 --> Loader Class Initialized
INFO - 2022-04-25 18:43:41 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:41 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:41 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:41 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:41 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:41 --> Upload Class Initialized
INFO - 2022-04-25 18:43:41 --> Table Class Initialized
INFO - 2022-04-25 18:43:41 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:41 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:41 --> Controller Class Initialized
INFO - 2022-04-25 18:43:41 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:41 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:41 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:41 --> Total execution time: 0.0097
INFO - 2022-04-25 13:13:47 --> Config Class Initialized
INFO - 2022-04-25 13:13:47 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:13:47 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:13:47 --> Utf8 Class Initialized
INFO - 2022-04-25 13:13:47 --> URI Class Initialized
INFO - 2022-04-25 13:13:47 --> Router Class Initialized
INFO - 2022-04-25 13:13:47 --> Output Class Initialized
INFO - 2022-04-25 13:13:47 --> Security Class Initialized
DEBUG - 2022-04-25 13:13:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:13:47 --> Input Class Initialized
INFO - 2022-04-25 13:13:47 --> Language Class Initialized
INFO - 2022-04-25 18:43:47 --> Loader Class Initialized
INFO - 2022-04-25 18:43:47 --> Helper loaded: url_helper
INFO - 2022-04-25 18:43:47 --> Helper loaded: file_helper
INFO - 2022-04-25 18:43:47 --> Helper loaded: genral_helper
INFO - 2022-04-25 18:43:47 --> Database Driver Class Initialized
DEBUG - 2022-04-25 18:43:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 18:43:47 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 18:43:47 --> Upload Class Initialized
INFO - 2022-04-25 18:43:47 --> Table Class Initialized
INFO - 2022-04-25 18:43:47 --> Helper loaded: form_helper
INFO - 2022-04-25 18:43:47 --> Form Validation Class Initialized
INFO - 2022-04-25 18:43:47 --> Controller Class Initialized
INFO - 2022-04-25 18:43:47 --> Model "Api_model" initialized
INFO - 2022-04-25 18:43:47 --> Model "Common_model" initialized
INFO - 2022-04-25 18:43:47 --> Final output sent to browser
DEBUG - 2022-04-25 18:43:47 --> Total execution time: 0.0070
INFO - 2022-04-25 13:41:38 --> Config Class Initialized
INFO - 2022-04-25 13:41:38 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:41:38 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:41:38 --> Utf8 Class Initialized
INFO - 2022-04-25 13:41:38 --> URI Class Initialized
INFO - 2022-04-25 13:41:38 --> Router Class Initialized
INFO - 2022-04-25 13:41:38 --> Output Class Initialized
INFO - 2022-04-25 13:41:38 --> Security Class Initialized
DEBUG - 2022-04-25 13:41:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:41:38 --> Input Class Initialized
INFO - 2022-04-25 13:41:38 --> Language Class Initialized
INFO - 2022-04-25 19:11:38 --> Loader Class Initialized
INFO - 2022-04-25 19:11:38 --> Helper loaded: url_helper
INFO - 2022-04-25 19:11:38 --> Helper loaded: file_helper
INFO - 2022-04-25 19:11:38 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:11:38 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:11:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:11:38 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:11:38 --> Upload Class Initialized
INFO - 2022-04-25 19:11:38 --> Table Class Initialized
INFO - 2022-04-25 19:11:38 --> Helper loaded: form_helper
INFO - 2022-04-25 19:11:38 --> Form Validation Class Initialized
INFO - 2022-04-25 19:11:38 --> Controller Class Initialized
INFO - 2022-04-25 19:11:38 --> Model "Api_model" initialized
INFO - 2022-04-25 19:11:38 --> Model "Common_model" initialized
INFO - 2022-04-25 19:11:38 --> Final output sent to browser
DEBUG - 2022-04-25 19:11:38 --> Total execution time: 0.0059
INFO - 2022-04-25 13:41:40 --> Config Class Initialized
INFO - 2022-04-25 13:41:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:41:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:41:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:41:40 --> URI Class Initialized
INFO - 2022-04-25 13:41:40 --> Router Class Initialized
INFO - 2022-04-25 13:41:40 --> Output Class Initialized
INFO - 2022-04-25 13:41:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:41:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:41:40 --> Input Class Initialized
INFO - 2022-04-25 13:41:40 --> Language Class Initialized
INFO - 2022-04-25 19:11:40 --> Loader Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:11:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:11:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:11:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:11:40 --> Upload Class Initialized
INFO - 2022-04-25 19:11:40 --> Table Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:11:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:11:40 --> Controller Class Initialized
INFO - 2022-04-25 19:11:40 --> Model "Api_model" initialized
INFO - 2022-04-25 19:11:40 --> Model "Common_model" initialized
INFO - 2022-04-25 19:11:40 --> Final output sent to browser
DEBUG - 2022-04-25 19:11:40 --> Total execution time: 0.0036
INFO - 2022-04-25 13:41:40 --> Config Class Initialized
INFO - 2022-04-25 13:41:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:41:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:41:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:41:40 --> URI Class Initialized
INFO - 2022-04-25 13:41:40 --> Router Class Initialized
INFO - 2022-04-25 13:41:40 --> Output Class Initialized
INFO - 2022-04-25 13:41:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:41:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:41:40 --> Input Class Initialized
INFO - 2022-04-25 13:41:40 --> Language Class Initialized
INFO - 2022-04-25 19:11:40 --> Loader Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:11:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:11:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:11:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:11:40 --> Upload Class Initialized
INFO - 2022-04-25 19:11:40 --> Table Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:11:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:11:40 --> Controller Class Initialized
INFO - 2022-04-25 19:11:40 --> Model "Api_model" initialized
INFO - 2022-04-25 19:11:40 --> Model "Common_model" initialized
INFO - 2022-04-25 19:11:40 --> Final output sent to browser
DEBUG - 2022-04-25 19:11:40 --> Total execution time: 0.0027
INFO - 2022-04-25 13:41:40 --> Config Class Initialized
INFO - 2022-04-25 13:41:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:41:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:41:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:41:40 --> URI Class Initialized
INFO - 2022-04-25 13:41:40 --> Router Class Initialized
INFO - 2022-04-25 13:41:40 --> Output Class Initialized
INFO - 2022-04-25 13:41:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:41:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:41:40 --> Input Class Initialized
INFO - 2022-04-25 13:41:40 --> Language Class Initialized
INFO - 2022-04-25 19:11:40 --> Loader Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:11:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:11:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:11:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:11:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:11:40 --> Upload Class Initialized
INFO - 2022-04-25 19:11:40 --> Table Class Initialized
INFO - 2022-04-25 19:11:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:11:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:11:40 --> Controller Class Initialized
INFO - 2022-04-25 19:11:40 --> Model "Api_model" initialized
INFO - 2022-04-25 19:11:40 --> Model "Common_model" initialized
INFO - 2022-04-25 13:48:04 --> Config Class Initialized
INFO - 2022-04-25 13:48:04 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:04 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:04 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:04 --> URI Class Initialized
INFO - 2022-04-25 13:48:04 --> Router Class Initialized
INFO - 2022-04-25 13:48:04 --> Output Class Initialized
INFO - 2022-04-25 13:48:04 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:04 --> Input Class Initialized
INFO - 2022-04-25 13:48:04 --> Language Class Initialized
INFO - 2022-04-25 13:48:04 --> Loader Class Initialized
INFO - 2022-04-25 13:48:04 --> Helper loaded: url_helper
INFO - 2022-04-25 13:48:04 --> Helper loaded: file_helper
INFO - 2022-04-25 13:48:04 --> Helper loaded: genral_helper
INFO - 2022-04-25 13:48:04 --> Database Driver Class Initialized
DEBUG - 2022-04-25 13:48:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 13:48:04 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 13:48:04 --> Upload Class Initialized
INFO - 2022-04-25 13:48:04 --> Table Class Initialized
INFO - 2022-04-25 13:48:04 --> Helper loaded: form_helper
INFO - 2022-04-25 13:48:04 --> Form Validation Class Initialized
INFO - 2022-04-25 13:48:04 --> Controller Class Initialized
INFO - 2022-04-25 13:48:04 --> File loaded: /home/athealcpanel/public_html/application/views/admin/login.php
INFO - 2022-04-25 13:48:04 --> Final output sent to browser
DEBUG - 2022-04-25 13:48:04 --> Total execution time: 0.0066
INFO - 2022-04-25 13:48:07 --> Config Class Initialized
INFO - 2022-04-25 13:48:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:07 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:07 --> URI Class Initialized
DEBUG - 2022-04-25 13:48:07 --> No URI present. Default controller set.
INFO - 2022-04-25 13:48:07 --> Router Class Initialized
INFO - 2022-04-25 13:48:07 --> Output Class Initialized
INFO - 2022-04-25 13:48:07 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:07 --> Input Class Initialized
INFO - 2022-04-25 13:48:07 --> Language Class Initialized
INFO - 2022-04-25 19:18:07 --> Loader Class Initialized
INFO - 2022-04-25 19:18:07 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:07 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:07 --> Upload Class Initialized
INFO - 2022-04-25 19:18:07 --> Table Class Initialized
INFO - 2022-04-25 19:18:07 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:07 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:07 --> Controller Class Initialized
INFO - 2022-04-25 19:18:07 --> Model "Banner_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Features_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Speciality_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Admin_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Social_media_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Services_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Video_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 13:48:07 --> Config Class Initialized
INFO - 2022-04-25 13:48:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:07 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:07 --> URI Class Initialized
DEBUG - 2022-04-25 13:48:07 --> No URI present. Default controller set.
INFO - 2022-04-25 13:48:07 --> Router Class Initialized
INFO - 2022-04-25 13:48:07 --> Output Class Initialized
INFO - 2022-04-25 13:48:07 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:07 --> Input Class Initialized
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 13:48:07 --> Language Class Initialized
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 19:18:07 --> Loader Class Initialized
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 19:18:07 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 19:18:07 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:07 --> Database Driver Class Initialized
INFO - 2022-04-25 19:18:07 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:07 --> Total execution time: 0.0048
DEBUG - 2022-04-25 19:18:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:07 --> Upload Class Initialized
INFO - 2022-04-25 19:18:07 --> Table Class Initialized
INFO - 2022-04-25 19:18:07 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:07 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:07 --> Controller Class Initialized
INFO - 2022-04-25 19:18:07 --> Model "Banner_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Features_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Speciality_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Admin_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Social_media_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Services_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Video_model" initialized
INFO - 2022-04-25 19:18:07 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 19:18:07 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 19:18:07 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:07 --> Total execution time: 0.0064
INFO - 2022-04-25 13:48:11 --> Config Class Initialized
INFO - 2022-04-25 13:48:11 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:11 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:11 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:11 --> URI Class Initialized
INFO - 2022-04-25 13:48:11 --> Router Class Initialized
INFO - 2022-04-25 13:48:11 --> Output Class Initialized
INFO - 2022-04-25 13:48:11 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:11 --> Input Class Initialized
INFO - 2022-04-25 13:48:11 --> Language Class Initialized
INFO - 2022-04-25 19:18:11 --> Loader Class Initialized
INFO - 2022-04-25 19:18:11 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:11 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:11 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:11 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:11 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:11 --> Upload Class Initialized
INFO - 2022-04-25 19:18:11 --> Table Class Initialized
INFO - 2022-04-25 19:18:11 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:11 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:11 --> Controller Class Initialized
INFO - 2022-04-25 19:18:11 --> Model "Vendor_model" initialized
INFO - 2022-04-25 19:18:11 --> Model "Admin_model" initialized
INFO - 2022-04-25 19:18:11 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/header.php
INFO - 2022-04-25 19:18:11 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/sidebar.php
INFO - 2022-04-25 19:18:11 --> File loaded: /home/athealcpanel/public_html/application/views/partner/dashboard.php
INFO - 2022-04-25 19:18:11 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/footer.php
INFO - 2022-04-25 19:18:11 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:11 --> Total execution time: 0.0108
INFO - 2022-04-25 13:48:14 --> Config Class Initialized
INFO - 2022-04-25 13:48:14 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:14 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:14 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:14 --> URI Class Initialized
INFO - 2022-04-25 13:48:14 --> Router Class Initialized
INFO - 2022-04-25 13:48:14 --> Output Class Initialized
INFO - 2022-04-25 13:48:14 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:14 --> Input Class Initialized
INFO - 2022-04-25 13:48:14 --> Language Class Initialized
INFO - 2022-04-25 19:18:14 --> Loader Class Initialized
INFO - 2022-04-25 19:18:14 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:14 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:14 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:14 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:14 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:14 --> Upload Class Initialized
INFO - 2022-04-25 19:18:14 --> Table Class Initialized
INFO - 2022-04-25 19:18:14 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:14 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:14 --> Controller Class Initialized
INFO - 2022-04-25 19:18:14 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:14 --> Model "Common_model" initialized
INFO - 2022-04-25 19:18:14 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/header.php
INFO - 2022-04-25 19:18:14 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/sidebar.php
INFO - 2022-04-25 19:18:14 --> File loaded: /home/athealcpanel/public_html/application/views/partner/medicines/medicine_list.php
INFO - 2022-04-25 19:18:14 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/footer.php
INFO - 2022-04-25 19:18:14 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:14 --> Total execution time: 0.0155
INFO - 2022-04-25 13:48:15 --> Config Class Initialized
INFO - 2022-04-25 13:48:15 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:15 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:15 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:15 --> URI Class Initialized
INFO - 2022-04-25 13:48:15 --> Router Class Initialized
INFO - 2022-04-25 13:48:15 --> Output Class Initialized
INFO - 2022-04-25 13:48:15 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:15 --> Input Class Initialized
INFO - 2022-04-25 13:48:15 --> Language Class Initialized
INFO - 2022-04-25 19:18:15 --> Loader Class Initialized
INFO - 2022-04-25 19:18:15 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:15 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:15 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:15 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:15 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:15 --> Upload Class Initialized
INFO - 2022-04-25 19:18:15 --> Table Class Initialized
INFO - 2022-04-25 19:18:15 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:15 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:15 --> Controller Class Initialized
INFO - 2022-04-25 19:18:15 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:15 --> Model "Common_model" initialized
INFO - 2022-04-25 19:18:15 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:15 --> Total execution time: 0.0185
INFO - 2022-04-25 13:48:30 --> Config Class Initialized
INFO - 2022-04-25 13:48:30 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:30 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:30 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:30 --> URI Class Initialized
INFO - 2022-04-25 13:48:30 --> Router Class Initialized
INFO - 2022-04-25 13:48:30 --> Output Class Initialized
INFO - 2022-04-25 13:48:30 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:30 --> Input Class Initialized
INFO - 2022-04-25 13:48:30 --> Language Class Initialized
INFO - 2022-04-25 19:18:30 --> Loader Class Initialized
INFO - 2022-04-25 19:18:30 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:30 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:30 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:30 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:30 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:30 --> Upload Class Initialized
INFO - 2022-04-25 19:18:30 --> Table Class Initialized
INFO - 2022-04-25 19:18:30 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:30 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:30 --> Controller Class Initialized
INFO - 2022-04-25 19:18:30 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:30 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:18:40 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:18:40 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:18:40 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:18:40 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:18:40 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:18:40 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:40 --> Total execution time: 9.4823
INFO - 2022-04-25 13:48:40 --> Config Class Initialized
INFO - 2022-04-25 13:48:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:40 --> URI Class Initialized
INFO - 2022-04-25 13:48:40 --> Router Class Initialized
INFO - 2022-04-25 13:48:40 --> Output Class Initialized
INFO - 2022-04-25 13:48:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:40 --> Input Class Initialized
INFO - 2022-04-25 13:48:40 --> Language Class Initialized
INFO - 2022-04-25 19:18:40 --> Loader Class Initialized
INFO - 2022-04-25 19:18:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:40 --> Upload Class Initialized
INFO - 2022-04-25 19:18:40 --> Table Class Initialized
INFO - 2022-04-25 19:18:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:40 --> Controller Class Initialized
INFO - 2022-04-25 19:18:40 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:40 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:18:49 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:18:50 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:18:50 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:18:50 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:18:50 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:18:50 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:50 --> Total execution time: 9.5522
INFO - 2022-04-25 13:48:50 --> Config Class Initialized
INFO - 2022-04-25 13:48:50 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:50 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:50 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:50 --> URI Class Initialized
INFO - 2022-04-25 13:48:50 --> Router Class Initialized
INFO - 2022-04-25 13:48:50 --> Output Class Initialized
INFO - 2022-04-25 13:48:50 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:50 --> Input Class Initialized
INFO - 2022-04-25 13:48:50 --> Language Class Initialized
INFO - 2022-04-25 19:18:50 --> Loader Class Initialized
INFO - 2022-04-25 19:18:50 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:50 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:50 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:50 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:50 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:50 --> Upload Class Initialized
INFO - 2022-04-25 19:18:50 --> Table Class Initialized
INFO - 2022-04-25 19:18:50 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:50 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:50 --> Controller Class Initialized
INFO - 2022-04-25 19:18:50 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:50 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:18:59 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:18:59 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:18:59 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:18:59 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:18:59 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:18:59 --> Final output sent to browser
DEBUG - 2022-04-25 19:18:59 --> Total execution time: 9.5879
INFO - 2022-04-25 13:48:59 --> Config Class Initialized
INFO - 2022-04-25 13:48:59 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:48:59 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:48:59 --> Utf8 Class Initialized
INFO - 2022-04-25 13:48:59 --> URI Class Initialized
INFO - 2022-04-25 13:48:59 --> Router Class Initialized
INFO - 2022-04-25 13:48:59 --> Output Class Initialized
INFO - 2022-04-25 13:48:59 --> Security Class Initialized
DEBUG - 2022-04-25 13:48:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:48:59 --> Input Class Initialized
INFO - 2022-04-25 13:48:59 --> Language Class Initialized
INFO - 2022-04-25 19:18:59 --> Loader Class Initialized
INFO - 2022-04-25 19:18:59 --> Helper loaded: url_helper
INFO - 2022-04-25 19:18:59 --> Helper loaded: file_helper
INFO - 2022-04-25 19:18:59 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:18:59 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:18:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:18:59 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:18:59 --> Upload Class Initialized
INFO - 2022-04-25 19:18:59 --> Table Class Initialized
INFO - 2022-04-25 19:18:59 --> Helper loaded: form_helper
INFO - 2022-04-25 19:18:59 --> Form Validation Class Initialized
INFO - 2022-04-25 19:18:59 --> Controller Class Initialized
INFO - 2022-04-25 19:18:59 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:18:59 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:09 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:09 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:09 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:09 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:09 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:09 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:09 --> Total execution time: 9.6141
INFO - 2022-04-25 13:49:09 --> Config Class Initialized
INFO - 2022-04-25 13:49:09 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:09 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:09 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:09 --> URI Class Initialized
INFO - 2022-04-25 13:49:09 --> Router Class Initialized
INFO - 2022-04-25 13:49:09 --> Output Class Initialized
INFO - 2022-04-25 13:49:09 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:09 --> Input Class Initialized
INFO - 2022-04-25 13:49:09 --> Language Class Initialized
INFO - 2022-04-25 19:19:09 --> Loader Class Initialized
INFO - 2022-04-25 19:19:09 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:09 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:09 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:09 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:09 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:09 --> Upload Class Initialized
INFO - 2022-04-25 19:19:09 --> Table Class Initialized
INFO - 2022-04-25 19:19:09 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:09 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:09 --> Controller Class Initialized
INFO - 2022-04-25 19:19:09 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:09 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:19 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:19 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:19 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:19 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:19 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:19 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:19 --> Total execution time: 9.6034
INFO - 2022-04-25 13:49:19 --> Config Class Initialized
INFO - 2022-04-25 13:49:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:19 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:19 --> URI Class Initialized
INFO - 2022-04-25 13:49:19 --> Router Class Initialized
INFO - 2022-04-25 13:49:19 --> Output Class Initialized
INFO - 2022-04-25 13:49:19 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:19 --> Input Class Initialized
INFO - 2022-04-25 13:49:19 --> Language Class Initialized
INFO - 2022-04-25 19:19:19 --> Loader Class Initialized
INFO - 2022-04-25 19:19:19 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:19 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:19 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:19 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:19 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:19 --> Upload Class Initialized
INFO - 2022-04-25 19:19:19 --> Table Class Initialized
INFO - 2022-04-25 19:19:19 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:19 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:19 --> Controller Class Initialized
INFO - 2022-04-25 19:19:19 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:19 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:28 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:29 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:29 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:29 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:29 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:29 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:29 --> Total execution time: 9.5227
INFO - 2022-04-25 13:49:29 --> Config Class Initialized
INFO - 2022-04-25 13:49:29 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:29 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:29 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:29 --> URI Class Initialized
INFO - 2022-04-25 13:49:29 --> Router Class Initialized
INFO - 2022-04-25 13:49:29 --> Output Class Initialized
INFO - 2022-04-25 13:49:29 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:29 --> Input Class Initialized
INFO - 2022-04-25 13:49:29 --> Language Class Initialized
INFO - 2022-04-25 19:19:29 --> Loader Class Initialized
INFO - 2022-04-25 19:19:29 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:29 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:29 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:29 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:29 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:29 --> Upload Class Initialized
INFO - 2022-04-25 19:19:29 --> Table Class Initialized
INFO - 2022-04-25 19:19:29 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:29 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:29 --> Controller Class Initialized
INFO - 2022-04-25 19:19:29 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:29 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:38 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:38 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:38 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:38 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:38 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:38 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:38 --> Total execution time: 9.5284
INFO - 2022-04-25 13:49:38 --> Config Class Initialized
INFO - 2022-04-25 13:49:38 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:38 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:38 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:38 --> URI Class Initialized
INFO - 2022-04-25 13:49:38 --> Router Class Initialized
INFO - 2022-04-25 13:49:38 --> Output Class Initialized
INFO - 2022-04-25 13:49:38 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:38 --> Input Class Initialized
INFO - 2022-04-25 13:49:38 --> Language Class Initialized
INFO - 2022-04-25 19:19:38 --> Loader Class Initialized
INFO - 2022-04-25 19:19:38 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:38 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:38 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:38 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:38 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:38 --> Upload Class Initialized
INFO - 2022-04-25 19:19:38 --> Table Class Initialized
INFO - 2022-04-25 19:19:38 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:38 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:38 --> Controller Class Initialized
INFO - 2022-04-25 19:19:38 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:38 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:48 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:48 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:48 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:48 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:48 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:48 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:48 --> Total execution time: 9.5202
INFO - 2022-04-25 13:49:48 --> Config Class Initialized
INFO - 2022-04-25 13:49:48 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:48 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:48 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:48 --> URI Class Initialized
INFO - 2022-04-25 13:49:48 --> Router Class Initialized
INFO - 2022-04-25 13:49:48 --> Output Class Initialized
INFO - 2022-04-25 13:49:48 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:48 --> Input Class Initialized
INFO - 2022-04-25 13:49:48 --> Language Class Initialized
INFO - 2022-04-25 19:19:48 --> Loader Class Initialized
INFO - 2022-04-25 19:19:48 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:48 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:48 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:48 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:48 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:48 --> Upload Class Initialized
INFO - 2022-04-25 19:19:48 --> Table Class Initialized
INFO - 2022-04-25 19:19:48 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:48 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:48 --> Controller Class Initialized
INFO - 2022-04-25 19:19:48 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:48 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:19:58 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:19:58 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:19:58 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:19:58 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:19:58 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:19:58 --> Final output sent to browser
DEBUG - 2022-04-25 19:19:58 --> Total execution time: 9.7017
INFO - 2022-04-25 13:49:58 --> Config Class Initialized
INFO - 2022-04-25 13:49:58 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:49:58 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:49:58 --> Utf8 Class Initialized
INFO - 2022-04-25 13:49:58 --> URI Class Initialized
INFO - 2022-04-25 13:49:58 --> Router Class Initialized
INFO - 2022-04-25 13:49:58 --> Output Class Initialized
INFO - 2022-04-25 13:49:58 --> Security Class Initialized
DEBUG - 2022-04-25 13:49:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:49:58 --> Input Class Initialized
INFO - 2022-04-25 13:49:58 --> Language Class Initialized
INFO - 2022-04-25 19:19:58 --> Loader Class Initialized
INFO - 2022-04-25 19:19:58 --> Helper loaded: url_helper
INFO - 2022-04-25 19:19:58 --> Helper loaded: file_helper
INFO - 2022-04-25 19:19:58 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:19:58 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:19:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:19:58 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:19:58 --> Upload Class Initialized
INFO - 2022-04-25 19:19:58 --> Table Class Initialized
INFO - 2022-04-25 19:19:58 --> Helper loaded: form_helper
INFO - 2022-04-25 19:19:58 --> Form Validation Class Initialized
INFO - 2022-04-25 19:19:58 --> Controller Class Initialized
INFO - 2022-04-25 19:19:58 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:19:58 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:10 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:10 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:10 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:10 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:10 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:10 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:10 --> Total execution time: 12.3734
INFO - 2022-04-25 13:50:11 --> Config Class Initialized
INFO - 2022-04-25 13:50:11 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:11 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:11 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:11 --> URI Class Initialized
INFO - 2022-04-25 13:50:11 --> Router Class Initialized
INFO - 2022-04-25 13:50:11 --> Output Class Initialized
INFO - 2022-04-25 13:50:11 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:11 --> Input Class Initialized
INFO - 2022-04-25 13:50:11 --> Language Class Initialized
INFO - 2022-04-25 19:20:11 --> Loader Class Initialized
INFO - 2022-04-25 19:20:11 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:11 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:11 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:11 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:11 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:11 --> Upload Class Initialized
INFO - 2022-04-25 19:20:11 --> Table Class Initialized
INFO - 2022-04-25 19:20:11 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:11 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:11 --> Controller Class Initialized
INFO - 2022-04-25 19:20:11 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:11 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:20 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:20 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:20 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:20 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:20 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:20 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:20 --> Total execution time: 9.6638
INFO - 2022-04-25 13:50:20 --> Config Class Initialized
INFO - 2022-04-25 13:50:20 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:20 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:20 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:20 --> URI Class Initialized
INFO - 2022-04-25 13:50:20 --> Router Class Initialized
INFO - 2022-04-25 13:50:20 --> Output Class Initialized
INFO - 2022-04-25 13:50:20 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:20 --> Input Class Initialized
INFO - 2022-04-25 13:50:20 --> Language Class Initialized
INFO - 2022-04-25 19:20:20 --> Loader Class Initialized
INFO - 2022-04-25 19:20:20 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:20 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:20 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:20 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:20 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:20 --> Upload Class Initialized
INFO - 2022-04-25 19:20:20 --> Table Class Initialized
INFO - 2022-04-25 19:20:20 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:20 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:20 --> Controller Class Initialized
INFO - 2022-04-25 19:20:20 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:20 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:30 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:30 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:30 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:30 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:30 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:30 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:30 --> Total execution time: 9.5724
INFO - 2022-04-25 13:50:30 --> Config Class Initialized
INFO - 2022-04-25 13:50:30 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:30 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:30 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:30 --> URI Class Initialized
INFO - 2022-04-25 13:50:30 --> Router Class Initialized
INFO - 2022-04-25 13:50:30 --> Output Class Initialized
INFO - 2022-04-25 13:50:30 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:30 --> Input Class Initialized
INFO - 2022-04-25 13:50:30 --> Language Class Initialized
INFO - 2022-04-25 19:20:30 --> Loader Class Initialized
INFO - 2022-04-25 19:20:30 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:30 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:30 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:30 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:30 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:30 --> Upload Class Initialized
INFO - 2022-04-25 19:20:30 --> Table Class Initialized
INFO - 2022-04-25 19:20:30 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:30 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:30 --> Controller Class Initialized
INFO - 2022-04-25 19:20:30 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:30 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:40 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:40 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:40 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:40 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:40 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:40 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:40 --> Total execution time: 9.6665
INFO - 2022-04-25 13:50:40 --> Config Class Initialized
INFO - 2022-04-25 13:50:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:40 --> URI Class Initialized
INFO - 2022-04-25 13:50:40 --> Router Class Initialized
INFO - 2022-04-25 13:50:40 --> Output Class Initialized
INFO - 2022-04-25 13:50:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:40 --> Input Class Initialized
INFO - 2022-04-25 13:50:40 --> Language Class Initialized
INFO - 2022-04-25 19:20:40 --> Loader Class Initialized
INFO - 2022-04-25 19:20:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:40 --> Upload Class Initialized
INFO - 2022-04-25 19:20:40 --> Table Class Initialized
INFO - 2022-04-25 19:20:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:40 --> Controller Class Initialized
INFO - 2022-04-25 19:20:40 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:40 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:49 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:50 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:50 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:50 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:50 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:50 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:50 --> Total execution time: 9.6896
INFO - 2022-04-25 13:50:50 --> Config Class Initialized
INFO - 2022-04-25 13:50:50 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:50 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:50 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:50 --> URI Class Initialized
INFO - 2022-04-25 13:50:50 --> Router Class Initialized
INFO - 2022-04-25 13:50:50 --> Output Class Initialized
INFO - 2022-04-25 13:50:50 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:50 --> Input Class Initialized
INFO - 2022-04-25 13:50:50 --> Language Class Initialized
INFO - 2022-04-25 19:20:50 --> Loader Class Initialized
INFO - 2022-04-25 19:20:50 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:50 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:50 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:50 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:50 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:50 --> Upload Class Initialized
INFO - 2022-04-25 19:20:50 --> Table Class Initialized
INFO - 2022-04-25 19:20:50 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:50 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:50 --> Controller Class Initialized
INFO - 2022-04-25 19:20:50 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:50 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:20:59 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:20:59 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:20:59 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:20:59 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:20:59 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:20:59 --> Final output sent to browser
DEBUG - 2022-04-25 19:20:59 --> Total execution time: 9.5725
INFO - 2022-04-25 13:50:59 --> Config Class Initialized
INFO - 2022-04-25 13:50:59 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:50:59 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:50:59 --> Utf8 Class Initialized
INFO - 2022-04-25 13:50:59 --> URI Class Initialized
INFO - 2022-04-25 13:50:59 --> Router Class Initialized
INFO - 2022-04-25 13:50:59 --> Output Class Initialized
INFO - 2022-04-25 13:50:59 --> Security Class Initialized
DEBUG - 2022-04-25 13:50:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:50:59 --> Input Class Initialized
INFO - 2022-04-25 13:50:59 --> Language Class Initialized
INFO - 2022-04-25 19:20:59 --> Loader Class Initialized
INFO - 2022-04-25 19:20:59 --> Helper loaded: url_helper
INFO - 2022-04-25 19:20:59 --> Helper loaded: file_helper
INFO - 2022-04-25 19:20:59 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:20:59 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:20:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:20:59 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:20:59 --> Upload Class Initialized
INFO - 2022-04-25 19:20:59 --> Table Class Initialized
INFO - 2022-04-25 19:20:59 --> Helper loaded: form_helper
INFO - 2022-04-25 19:20:59 --> Form Validation Class Initialized
INFO - 2022-04-25 19:20:59 --> Controller Class Initialized
INFO - 2022-04-25 19:20:59 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:20:59 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:09 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:09 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:09 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:09 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:09 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:09 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:09 --> Total execution time: 9.8557
INFO - 2022-04-25 13:51:09 --> Config Class Initialized
INFO - 2022-04-25 13:51:09 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:09 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:09 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:09 --> URI Class Initialized
INFO - 2022-04-25 13:51:09 --> Router Class Initialized
INFO - 2022-04-25 13:51:09 --> Output Class Initialized
INFO - 2022-04-25 13:51:09 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:09 --> Input Class Initialized
INFO - 2022-04-25 13:51:09 --> Language Class Initialized
INFO - 2022-04-25 19:21:09 --> Loader Class Initialized
INFO - 2022-04-25 19:21:09 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:09 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:09 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:09 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:09 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:09 --> Upload Class Initialized
INFO - 2022-04-25 19:21:09 --> Table Class Initialized
INFO - 2022-04-25 19:21:09 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:09 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:09 --> Controller Class Initialized
INFO - 2022-04-25 19:21:09 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:09 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:19 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:19 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:19 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:19 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:19 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:19 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:19 --> Total execution time: 9.5676
INFO - 2022-04-25 13:51:19 --> Config Class Initialized
INFO - 2022-04-25 13:51:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:19 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:19 --> URI Class Initialized
INFO - 2022-04-25 13:51:19 --> Router Class Initialized
INFO - 2022-04-25 13:51:19 --> Output Class Initialized
INFO - 2022-04-25 13:51:19 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:19 --> Input Class Initialized
INFO - 2022-04-25 13:51:19 --> Language Class Initialized
INFO - 2022-04-25 19:21:19 --> Loader Class Initialized
INFO - 2022-04-25 19:21:19 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:19 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:19 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:19 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:19 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:19 --> Upload Class Initialized
INFO - 2022-04-25 19:21:19 --> Table Class Initialized
INFO - 2022-04-25 19:21:19 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:19 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:19 --> Controller Class Initialized
INFO - 2022-04-25 19:21:19 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:19 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:29 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:29 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:29 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:29 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:29 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:29 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:29 --> Total execution time: 9.8854
INFO - 2022-04-25 13:51:29 --> Config Class Initialized
INFO - 2022-04-25 13:51:29 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:29 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:29 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:29 --> URI Class Initialized
INFO - 2022-04-25 13:51:29 --> Router Class Initialized
INFO - 2022-04-25 13:51:29 --> Output Class Initialized
INFO - 2022-04-25 13:51:29 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:29 --> Input Class Initialized
INFO - 2022-04-25 13:51:29 --> Language Class Initialized
INFO - 2022-04-25 19:21:29 --> Loader Class Initialized
INFO - 2022-04-25 19:21:29 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:29 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:29 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:29 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:29 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:29 --> Upload Class Initialized
INFO - 2022-04-25 19:21:29 --> Table Class Initialized
INFO - 2022-04-25 19:21:29 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:29 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:29 --> Controller Class Initialized
INFO - 2022-04-25 19:21:29 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:29 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:38 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:39 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:39 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:39 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:39 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:39 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:39 --> Total execution time: 9.4975
INFO - 2022-04-25 13:51:39 --> Config Class Initialized
INFO - 2022-04-25 13:51:39 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:39 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:39 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:39 --> URI Class Initialized
INFO - 2022-04-25 13:51:39 --> Router Class Initialized
INFO - 2022-04-25 13:51:39 --> Output Class Initialized
INFO - 2022-04-25 13:51:39 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:39 --> Input Class Initialized
INFO - 2022-04-25 13:51:39 --> Language Class Initialized
INFO - 2022-04-25 19:21:39 --> Loader Class Initialized
INFO - 2022-04-25 19:21:39 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:39 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:39 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:39 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:39 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:39 --> Upload Class Initialized
INFO - 2022-04-25 19:21:39 --> Table Class Initialized
INFO - 2022-04-25 19:21:39 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:39 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:39 --> Controller Class Initialized
INFO - 2022-04-25 19:21:39 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:39 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:48 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:48 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:48 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:48 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:48 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:48 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:48 --> Total execution time: 9.4381
INFO - 2022-04-25 13:51:48 --> Config Class Initialized
INFO - 2022-04-25 13:51:48 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:48 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:48 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:48 --> URI Class Initialized
INFO - 2022-04-25 13:51:48 --> Router Class Initialized
INFO - 2022-04-25 13:51:48 --> Output Class Initialized
INFO - 2022-04-25 13:51:48 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:48 --> Input Class Initialized
INFO - 2022-04-25 13:51:48 --> Language Class Initialized
INFO - 2022-04-25 19:21:48 --> Loader Class Initialized
INFO - 2022-04-25 19:21:48 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:48 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:48 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:48 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:48 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:48 --> Upload Class Initialized
INFO - 2022-04-25 19:21:48 --> Table Class Initialized
INFO - 2022-04-25 19:21:48 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:48 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:48 --> Controller Class Initialized
INFO - 2022-04-25 19:21:48 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:48 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:21:58 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:21:58 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:21:58 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:21:58 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:21:58 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:21:58 --> Final output sent to browser
DEBUG - 2022-04-25 19:21:58 --> Total execution time: 9.5770
INFO - 2022-04-25 13:51:58 --> Config Class Initialized
INFO - 2022-04-25 13:51:58 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:51:58 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:51:58 --> Utf8 Class Initialized
INFO - 2022-04-25 13:51:58 --> URI Class Initialized
INFO - 2022-04-25 13:51:58 --> Router Class Initialized
INFO - 2022-04-25 13:51:58 --> Output Class Initialized
INFO - 2022-04-25 13:51:58 --> Security Class Initialized
DEBUG - 2022-04-25 13:51:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:51:58 --> Input Class Initialized
INFO - 2022-04-25 13:51:58 --> Language Class Initialized
INFO - 2022-04-25 19:21:58 --> Loader Class Initialized
INFO - 2022-04-25 19:21:58 --> Helper loaded: url_helper
INFO - 2022-04-25 19:21:58 --> Helper loaded: file_helper
INFO - 2022-04-25 19:21:58 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:21:58 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:21:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:21:58 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:21:58 --> Upload Class Initialized
INFO - 2022-04-25 19:21:58 --> Table Class Initialized
INFO - 2022-04-25 19:21:58 --> Helper loaded: form_helper
INFO - 2022-04-25 19:21:58 --> Form Validation Class Initialized
INFO - 2022-04-25 19:21:58 --> Controller Class Initialized
INFO - 2022-04-25 19:21:58 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:21:58 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:08 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:08 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:08 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:08 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:08 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:08 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:08 --> Total execution time: 9.7786
INFO - 2022-04-25 13:52:08 --> Config Class Initialized
INFO - 2022-04-25 13:52:08 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:08 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:08 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:08 --> URI Class Initialized
INFO - 2022-04-25 13:52:08 --> Router Class Initialized
INFO - 2022-04-25 13:52:08 --> Output Class Initialized
INFO - 2022-04-25 13:52:08 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:08 --> Input Class Initialized
INFO - 2022-04-25 13:52:08 --> Language Class Initialized
INFO - 2022-04-25 19:22:08 --> Loader Class Initialized
INFO - 2022-04-25 19:22:08 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:08 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:08 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:08 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:08 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:08 --> Upload Class Initialized
INFO - 2022-04-25 19:22:08 --> Table Class Initialized
INFO - 2022-04-25 19:22:08 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:08 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:08 --> Controller Class Initialized
INFO - 2022-04-25 19:22:08 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:08 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:17 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:17 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:17 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:17 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:17 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:17 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:17 --> Total execution time: 9.5074
INFO - 2022-04-25 13:52:17 --> Config Class Initialized
INFO - 2022-04-25 13:52:17 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:17 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:17 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:17 --> URI Class Initialized
INFO - 2022-04-25 13:52:17 --> Router Class Initialized
INFO - 2022-04-25 13:52:17 --> Output Class Initialized
INFO - 2022-04-25 13:52:17 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:17 --> Input Class Initialized
INFO - 2022-04-25 13:52:17 --> Language Class Initialized
INFO - 2022-04-25 19:22:17 --> Loader Class Initialized
INFO - 2022-04-25 19:22:17 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:17 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:17 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:17 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:17 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:17 --> Upload Class Initialized
INFO - 2022-04-25 19:22:17 --> Table Class Initialized
INFO - 2022-04-25 19:22:17 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:17 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:17 --> Controller Class Initialized
INFO - 2022-04-25 19:22:17 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:17 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:27 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:27 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:27 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:27 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:27 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:27 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:27 --> Total execution time: 9.5435
INFO - 2022-04-25 13:52:27 --> Config Class Initialized
INFO - 2022-04-25 13:52:27 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:27 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:27 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:27 --> URI Class Initialized
INFO - 2022-04-25 13:52:27 --> Router Class Initialized
INFO - 2022-04-25 13:52:27 --> Output Class Initialized
INFO - 2022-04-25 13:52:27 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:27 --> Input Class Initialized
INFO - 2022-04-25 13:52:27 --> Language Class Initialized
INFO - 2022-04-25 19:22:27 --> Loader Class Initialized
INFO - 2022-04-25 19:22:27 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:27 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:27 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:27 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:27 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:27 --> Upload Class Initialized
INFO - 2022-04-25 19:22:27 --> Table Class Initialized
INFO - 2022-04-25 19:22:27 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:27 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:27 --> Controller Class Initialized
INFO - 2022-04-25 19:22:27 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:27 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:37 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:37 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:37 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:37 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:37 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:37 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:37 --> Total execution time: 9.5974
INFO - 2022-04-25 13:52:37 --> Config Class Initialized
INFO - 2022-04-25 13:52:37 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:37 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:37 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:37 --> URI Class Initialized
INFO - 2022-04-25 13:52:37 --> Router Class Initialized
INFO - 2022-04-25 13:52:37 --> Output Class Initialized
INFO - 2022-04-25 13:52:37 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:37 --> Input Class Initialized
INFO - 2022-04-25 13:52:37 --> Language Class Initialized
INFO - 2022-04-25 19:22:37 --> Loader Class Initialized
INFO - 2022-04-25 19:22:37 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:37 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:37 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:37 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:37 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:37 --> Upload Class Initialized
INFO - 2022-04-25 19:22:37 --> Table Class Initialized
INFO - 2022-04-25 19:22:37 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:37 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:37 --> Controller Class Initialized
INFO - 2022-04-25 19:22:37 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:37 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:46 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:46 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:46 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:46 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:46 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:46 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:46 --> Total execution time: 9.4618
INFO - 2022-04-25 13:52:47 --> Config Class Initialized
INFO - 2022-04-25 13:52:47 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:47 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:47 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:47 --> URI Class Initialized
INFO - 2022-04-25 13:52:47 --> Router Class Initialized
INFO - 2022-04-25 13:52:47 --> Output Class Initialized
INFO - 2022-04-25 13:52:47 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:47 --> Input Class Initialized
INFO - 2022-04-25 13:52:47 --> Language Class Initialized
INFO - 2022-04-25 19:22:47 --> Loader Class Initialized
INFO - 2022-04-25 19:22:47 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:47 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:47 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:47 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:47 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:47 --> Upload Class Initialized
INFO - 2022-04-25 19:22:47 --> Table Class Initialized
INFO - 2022-04-25 19:22:47 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:47 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:47 --> Controller Class Initialized
INFO - 2022-04-25 19:22:47 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:47 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:22:56 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:22:56 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:22:56 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:22:56 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:22:56 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:22:56 --> Final output sent to browser
DEBUG - 2022-04-25 19:22:56 --> Total execution time: 9.5886
INFO - 2022-04-25 13:52:56 --> Config Class Initialized
INFO - 2022-04-25 13:52:56 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:52:56 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:52:56 --> Utf8 Class Initialized
INFO - 2022-04-25 13:52:56 --> URI Class Initialized
INFO - 2022-04-25 13:52:56 --> Router Class Initialized
INFO - 2022-04-25 13:52:56 --> Output Class Initialized
INFO - 2022-04-25 13:52:56 --> Security Class Initialized
DEBUG - 2022-04-25 13:52:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:52:56 --> Input Class Initialized
INFO - 2022-04-25 13:52:56 --> Language Class Initialized
INFO - 2022-04-25 19:22:56 --> Loader Class Initialized
INFO - 2022-04-25 19:22:56 --> Helper loaded: url_helper
INFO - 2022-04-25 19:22:56 --> Helper loaded: file_helper
INFO - 2022-04-25 19:22:56 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:22:56 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:22:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:22:56 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:22:56 --> Upload Class Initialized
INFO - 2022-04-25 19:22:56 --> Table Class Initialized
INFO - 2022-04-25 19:22:56 --> Helper loaded: form_helper
INFO - 2022-04-25 19:22:56 --> Form Validation Class Initialized
INFO - 2022-04-25 19:22:56 --> Controller Class Initialized
INFO - 2022-04-25 19:22:56 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:22:56 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:06 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:06 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:06 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:06 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:06 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:06 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:06 --> Total execution time: 9.7508
INFO - 2022-04-25 13:53:06 --> Config Class Initialized
INFO - 2022-04-25 13:53:06 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:06 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:06 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:06 --> URI Class Initialized
INFO - 2022-04-25 13:53:06 --> Router Class Initialized
INFO - 2022-04-25 13:53:06 --> Output Class Initialized
INFO - 2022-04-25 13:53:06 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:06 --> Input Class Initialized
INFO - 2022-04-25 13:53:06 --> Language Class Initialized
INFO - 2022-04-25 19:23:06 --> Loader Class Initialized
INFO - 2022-04-25 19:23:06 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:06 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:06 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:06 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:06 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:06 --> Upload Class Initialized
INFO - 2022-04-25 19:23:06 --> Table Class Initialized
INFO - 2022-04-25 19:23:06 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:06 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:06 --> Controller Class Initialized
INFO - 2022-04-25 19:23:06 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:06 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:16 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:16 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:16 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:16 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:16 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:16 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:16 --> Total execution time: 9.7051
INFO - 2022-04-25 13:53:16 --> Config Class Initialized
INFO - 2022-04-25 13:53:16 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:16 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:16 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:16 --> URI Class Initialized
INFO - 2022-04-25 13:53:16 --> Router Class Initialized
INFO - 2022-04-25 13:53:16 --> Output Class Initialized
INFO - 2022-04-25 13:53:16 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:16 --> Input Class Initialized
INFO - 2022-04-25 13:53:16 --> Language Class Initialized
INFO - 2022-04-25 19:23:16 --> Loader Class Initialized
INFO - 2022-04-25 19:23:16 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:16 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:16 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:16 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:16 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:16 --> Upload Class Initialized
INFO - 2022-04-25 19:23:16 --> Table Class Initialized
INFO - 2022-04-25 19:23:16 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:16 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:16 --> Controller Class Initialized
INFO - 2022-04-25 19:23:16 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:16 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:25 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:26 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:26 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:26 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:26 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:26 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:26 --> Total execution time: 9.5827
INFO - 2022-04-25 13:53:26 --> Config Class Initialized
INFO - 2022-04-25 13:53:26 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:26 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:26 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:26 --> URI Class Initialized
INFO - 2022-04-25 13:53:26 --> Router Class Initialized
INFO - 2022-04-25 13:53:26 --> Output Class Initialized
INFO - 2022-04-25 13:53:26 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:26 --> Input Class Initialized
INFO - 2022-04-25 13:53:26 --> Language Class Initialized
INFO - 2022-04-25 19:23:26 --> Loader Class Initialized
INFO - 2022-04-25 19:23:26 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:26 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:26 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:26 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:26 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:26 --> Upload Class Initialized
INFO - 2022-04-25 19:23:26 --> Table Class Initialized
INFO - 2022-04-25 19:23:26 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:26 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:26 --> Controller Class Initialized
INFO - 2022-04-25 19:23:26 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:26 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:35 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:35 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:35 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:35 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:35 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:35 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:35 --> Total execution time: 9.7241
INFO - 2022-04-25 13:53:36 --> Config Class Initialized
INFO - 2022-04-25 13:53:36 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:36 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:36 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:36 --> URI Class Initialized
INFO - 2022-04-25 13:53:36 --> Router Class Initialized
INFO - 2022-04-25 13:53:36 --> Output Class Initialized
INFO - 2022-04-25 13:53:36 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:36 --> Input Class Initialized
INFO - 2022-04-25 13:53:36 --> Language Class Initialized
INFO - 2022-04-25 19:23:36 --> Loader Class Initialized
INFO - 2022-04-25 19:23:36 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:36 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:36 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:36 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:36 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:36 --> Upload Class Initialized
INFO - 2022-04-25 19:23:36 --> Table Class Initialized
INFO - 2022-04-25 19:23:36 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:36 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:36 --> Controller Class Initialized
INFO - 2022-04-25 19:23:36 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:36 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:45 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:45 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:45 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:45 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:45 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:45 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:45 --> Total execution time: 9.5651
INFO - 2022-04-25 13:53:45 --> Config Class Initialized
INFO - 2022-04-25 13:53:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:45 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:45 --> URI Class Initialized
INFO - 2022-04-25 13:53:45 --> Router Class Initialized
INFO - 2022-04-25 13:53:45 --> Output Class Initialized
INFO - 2022-04-25 13:53:45 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:45 --> Input Class Initialized
INFO - 2022-04-25 13:53:45 --> Language Class Initialized
INFO - 2022-04-25 19:23:45 --> Loader Class Initialized
INFO - 2022-04-25 19:23:45 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:45 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:45 --> Upload Class Initialized
INFO - 2022-04-25 19:23:45 --> Table Class Initialized
INFO - 2022-04-25 19:23:45 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:45 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:45 --> Controller Class Initialized
INFO - 2022-04-25 19:23:45 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:45 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:23:55 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:23:55 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:23:55 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:23:55 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:23:55 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:23:55 --> Final output sent to browser
DEBUG - 2022-04-25 19:23:55 --> Total execution time: 9.5560
INFO - 2022-04-25 13:53:55 --> Config Class Initialized
INFO - 2022-04-25 13:53:55 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:53:55 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:53:55 --> Utf8 Class Initialized
INFO - 2022-04-25 13:53:55 --> URI Class Initialized
INFO - 2022-04-25 13:53:55 --> Router Class Initialized
INFO - 2022-04-25 13:53:55 --> Output Class Initialized
INFO - 2022-04-25 13:53:55 --> Security Class Initialized
DEBUG - 2022-04-25 13:53:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:53:55 --> Input Class Initialized
INFO - 2022-04-25 13:53:55 --> Language Class Initialized
INFO - 2022-04-25 19:23:55 --> Loader Class Initialized
INFO - 2022-04-25 19:23:55 --> Helper loaded: url_helper
INFO - 2022-04-25 19:23:55 --> Helper loaded: file_helper
INFO - 2022-04-25 19:23:55 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:23:55 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:23:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:23:55 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:23:55 --> Upload Class Initialized
INFO - 2022-04-25 19:23:55 --> Table Class Initialized
INFO - 2022-04-25 19:23:55 --> Helper loaded: form_helper
INFO - 2022-04-25 19:23:55 --> Form Validation Class Initialized
INFO - 2022-04-25 19:23:55 --> Controller Class Initialized
INFO - 2022-04-25 19:23:55 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:23:55 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:05 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:05 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:05 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:05 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:05 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:05 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:05 --> Total execution time: 9.7754
INFO - 2022-04-25 13:54:05 --> Config Class Initialized
INFO - 2022-04-25 13:54:05 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:05 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:05 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:05 --> URI Class Initialized
INFO - 2022-04-25 13:54:05 --> Router Class Initialized
INFO - 2022-04-25 13:54:05 --> Output Class Initialized
INFO - 2022-04-25 13:54:05 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:05 --> Input Class Initialized
INFO - 2022-04-25 13:54:05 --> Language Class Initialized
INFO - 2022-04-25 19:24:05 --> Loader Class Initialized
INFO - 2022-04-25 19:24:05 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:05 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:05 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:05 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:05 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:05 --> Upload Class Initialized
INFO - 2022-04-25 19:24:05 --> Table Class Initialized
INFO - 2022-04-25 19:24:05 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:05 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:05 --> Controller Class Initialized
INFO - 2022-04-25 19:24:05 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:05 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:14 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:14 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:14 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:14 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:14 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:14 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:14 --> Total execution time: 9.6002
INFO - 2022-04-25 13:54:15 --> Config Class Initialized
INFO - 2022-04-25 13:54:15 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:15 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:15 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:15 --> URI Class Initialized
INFO - 2022-04-25 13:54:15 --> Router Class Initialized
INFO - 2022-04-25 13:54:15 --> Output Class Initialized
INFO - 2022-04-25 13:54:15 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:15 --> Input Class Initialized
INFO - 2022-04-25 13:54:15 --> Language Class Initialized
INFO - 2022-04-25 19:24:15 --> Loader Class Initialized
INFO - 2022-04-25 19:24:15 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:15 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:15 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:15 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:15 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:15 --> Upload Class Initialized
INFO - 2022-04-25 19:24:15 --> Table Class Initialized
INFO - 2022-04-25 19:24:15 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:15 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:15 --> Controller Class Initialized
INFO - 2022-04-25 19:24:15 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:15 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:24 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:24 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:24 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:24 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:24 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:24 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:24 --> Total execution time: 9.4611
INFO - 2022-04-25 13:54:24 --> Config Class Initialized
INFO - 2022-04-25 13:54:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:24 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:24 --> URI Class Initialized
INFO - 2022-04-25 13:54:24 --> Router Class Initialized
INFO - 2022-04-25 13:54:24 --> Output Class Initialized
INFO - 2022-04-25 13:54:24 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:24 --> Input Class Initialized
INFO - 2022-04-25 13:54:24 --> Language Class Initialized
INFO - 2022-04-25 19:24:24 --> Loader Class Initialized
INFO - 2022-04-25 19:24:24 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:24 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:24 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:24 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:24 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:24 --> Upload Class Initialized
INFO - 2022-04-25 19:24:24 --> Table Class Initialized
INFO - 2022-04-25 19:24:24 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:24 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:24 --> Controller Class Initialized
INFO - 2022-04-25 19:24:24 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:24 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:34 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:34 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:34 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:34 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:34 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:34 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:34 --> Total execution time: 9.5239
INFO - 2022-04-25 13:54:34 --> Config Class Initialized
INFO - 2022-04-25 13:54:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:34 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:34 --> URI Class Initialized
INFO - 2022-04-25 13:54:34 --> Router Class Initialized
INFO - 2022-04-25 13:54:34 --> Output Class Initialized
INFO - 2022-04-25 13:54:34 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:34 --> Input Class Initialized
INFO - 2022-04-25 13:54:34 --> Language Class Initialized
INFO - 2022-04-25 19:24:34 --> Loader Class Initialized
INFO - 2022-04-25 19:24:34 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:34 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:34 --> Upload Class Initialized
INFO - 2022-04-25 19:24:34 --> Table Class Initialized
INFO - 2022-04-25 19:24:34 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:34 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:34 --> Controller Class Initialized
INFO - 2022-04-25 19:24:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:34 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:43 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:43 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:43 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:43 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:43 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:43 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:43 --> Total execution time: 9.4723
INFO - 2022-04-25 13:54:43 --> Config Class Initialized
INFO - 2022-04-25 13:54:43 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:43 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:43 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:43 --> URI Class Initialized
INFO - 2022-04-25 13:54:43 --> Router Class Initialized
INFO - 2022-04-25 13:54:43 --> Output Class Initialized
INFO - 2022-04-25 13:54:43 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:43 --> Input Class Initialized
INFO - 2022-04-25 13:54:43 --> Language Class Initialized
INFO - 2022-04-25 19:24:43 --> Loader Class Initialized
INFO - 2022-04-25 19:24:43 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:43 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:43 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:43 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:43 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:43 --> Upload Class Initialized
INFO - 2022-04-25 19:24:43 --> Table Class Initialized
INFO - 2022-04-25 19:24:43 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:43 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:43 --> Controller Class Initialized
INFO - 2022-04-25 19:24:43 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:43 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:24:53 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:24:53 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:24:53 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:24:53 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:24:53 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:24:53 --> Final output sent to browser
DEBUG - 2022-04-25 19:24:53 --> Total execution time: 9.5969
INFO - 2022-04-25 13:54:53 --> Config Class Initialized
INFO - 2022-04-25 13:54:53 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:54:53 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:54:53 --> Utf8 Class Initialized
INFO - 2022-04-25 13:54:53 --> URI Class Initialized
INFO - 2022-04-25 13:54:53 --> Router Class Initialized
INFO - 2022-04-25 13:54:53 --> Output Class Initialized
INFO - 2022-04-25 13:54:53 --> Security Class Initialized
DEBUG - 2022-04-25 13:54:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:54:53 --> Input Class Initialized
INFO - 2022-04-25 13:54:53 --> Language Class Initialized
INFO - 2022-04-25 19:24:53 --> Loader Class Initialized
INFO - 2022-04-25 19:24:53 --> Helper loaded: url_helper
INFO - 2022-04-25 19:24:53 --> Helper loaded: file_helper
INFO - 2022-04-25 19:24:53 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:24:53 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:24:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:24:53 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:24:53 --> Upload Class Initialized
INFO - 2022-04-25 19:24:53 --> Table Class Initialized
INFO - 2022-04-25 19:24:53 --> Helper loaded: form_helper
INFO - 2022-04-25 19:24:53 --> Form Validation Class Initialized
INFO - 2022-04-25 19:24:53 --> Controller Class Initialized
INFO - 2022-04-25 19:24:53 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:24:53 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:04 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:05 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:05 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:05 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:05 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:05 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:05 --> Total execution time: 11.4148
INFO - 2022-04-25 13:55:05 --> Config Class Initialized
INFO - 2022-04-25 13:55:05 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:05 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:05 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:05 --> URI Class Initialized
INFO - 2022-04-25 13:55:05 --> Router Class Initialized
INFO - 2022-04-25 13:55:05 --> Output Class Initialized
INFO - 2022-04-25 13:55:05 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:05 --> Input Class Initialized
INFO - 2022-04-25 13:55:05 --> Language Class Initialized
INFO - 2022-04-25 19:25:05 --> Loader Class Initialized
INFO - 2022-04-25 19:25:05 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:05 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:05 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:05 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:05 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:05 --> Upload Class Initialized
INFO - 2022-04-25 19:25:05 --> Table Class Initialized
INFO - 2022-04-25 19:25:05 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:05 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:05 --> Controller Class Initialized
INFO - 2022-04-25 19:25:05 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:05 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:14 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:15 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:15 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:15 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:15 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:15 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:15 --> Total execution time: 9.8534
INFO - 2022-04-25 13:55:15 --> Config Class Initialized
INFO - 2022-04-25 13:55:15 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:15 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:15 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:15 --> URI Class Initialized
INFO - 2022-04-25 13:55:15 --> Router Class Initialized
INFO - 2022-04-25 13:55:15 --> Output Class Initialized
INFO - 2022-04-25 13:55:15 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:15 --> Input Class Initialized
INFO - 2022-04-25 13:55:15 --> Language Class Initialized
INFO - 2022-04-25 19:25:15 --> Loader Class Initialized
INFO - 2022-04-25 19:25:15 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:15 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:15 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:15 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:15 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:15 --> Upload Class Initialized
INFO - 2022-04-25 19:25:15 --> Table Class Initialized
INFO - 2022-04-25 19:25:15 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:15 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:15 --> Controller Class Initialized
INFO - 2022-04-25 19:25:15 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:15 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:24 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:24 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:24 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:24 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:24 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:24 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:24 --> Total execution time: 9.6540
INFO - 2022-04-25 13:55:24 --> Config Class Initialized
INFO - 2022-04-25 13:55:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:24 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:24 --> URI Class Initialized
INFO - 2022-04-25 13:55:24 --> Router Class Initialized
INFO - 2022-04-25 13:55:24 --> Output Class Initialized
INFO - 2022-04-25 13:55:24 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:24 --> Input Class Initialized
INFO - 2022-04-25 13:55:24 --> Language Class Initialized
INFO - 2022-04-25 19:25:24 --> Loader Class Initialized
INFO - 2022-04-25 19:25:24 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:24 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:24 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:24 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:24 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:24 --> Upload Class Initialized
INFO - 2022-04-25 19:25:24 --> Table Class Initialized
INFO - 2022-04-25 19:25:24 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:24 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:24 --> Controller Class Initialized
INFO - 2022-04-25 19:25:24 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:24 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:34 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:34 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:34 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:34 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:34 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:34 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:34 --> Total execution time: 9.6398
INFO - 2022-04-25 13:55:34 --> Config Class Initialized
INFO - 2022-04-25 13:55:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:34 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:34 --> URI Class Initialized
INFO - 2022-04-25 13:55:34 --> Router Class Initialized
INFO - 2022-04-25 13:55:34 --> Output Class Initialized
INFO - 2022-04-25 13:55:34 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:34 --> Input Class Initialized
INFO - 2022-04-25 13:55:34 --> Language Class Initialized
INFO - 2022-04-25 19:25:34 --> Loader Class Initialized
INFO - 2022-04-25 19:25:34 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:34 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:34 --> Upload Class Initialized
INFO - 2022-04-25 19:25:34 --> Table Class Initialized
INFO - 2022-04-25 19:25:34 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:34 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:34 --> Controller Class Initialized
INFO - 2022-04-25 19:25:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:34 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:44 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:44 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:44 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:44 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:44 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:44 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:44 --> Total execution time: 9.6084
INFO - 2022-04-25 13:55:44 --> Config Class Initialized
INFO - 2022-04-25 13:55:44 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:44 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:44 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:44 --> URI Class Initialized
INFO - 2022-04-25 13:55:44 --> Router Class Initialized
INFO - 2022-04-25 13:55:44 --> Output Class Initialized
INFO - 2022-04-25 13:55:44 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:44 --> Input Class Initialized
INFO - 2022-04-25 13:55:44 --> Language Class Initialized
INFO - 2022-04-25 19:25:44 --> Loader Class Initialized
INFO - 2022-04-25 19:25:44 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:44 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:44 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:44 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:44 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:44 --> Upload Class Initialized
INFO - 2022-04-25 19:25:44 --> Table Class Initialized
INFO - 2022-04-25 19:25:44 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:44 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:44 --> Controller Class Initialized
INFO - 2022-04-25 19:25:44 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:44 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:25:54 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:25:54 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:25:54 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:25:54 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:25:54 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:25:54 --> Final output sent to browser
DEBUG - 2022-04-25 19:25:54 --> Total execution time: 9.9490
INFO - 2022-04-25 13:55:54 --> Config Class Initialized
INFO - 2022-04-25 13:55:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:55:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:55:54 --> Utf8 Class Initialized
INFO - 2022-04-25 13:55:54 --> URI Class Initialized
INFO - 2022-04-25 13:55:54 --> Router Class Initialized
INFO - 2022-04-25 13:55:54 --> Output Class Initialized
INFO - 2022-04-25 13:55:54 --> Security Class Initialized
DEBUG - 2022-04-25 13:55:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:55:54 --> Input Class Initialized
INFO - 2022-04-25 13:55:54 --> Language Class Initialized
INFO - 2022-04-25 19:25:54 --> Loader Class Initialized
INFO - 2022-04-25 19:25:54 --> Helper loaded: url_helper
INFO - 2022-04-25 19:25:54 --> Helper loaded: file_helper
INFO - 2022-04-25 19:25:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:25:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:25:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:25:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:25:54 --> Upload Class Initialized
INFO - 2022-04-25 19:25:54 --> Table Class Initialized
INFO - 2022-04-25 19:25:54 --> Helper loaded: form_helper
INFO - 2022-04-25 19:25:54 --> Form Validation Class Initialized
INFO - 2022-04-25 19:25:54 --> Controller Class Initialized
INFO - 2022-04-25 19:25:54 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:25:54 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:26:03 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:26:04 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:26:04 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:26:04 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:26:04 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:26:04 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:04 --> Total execution time: 9.6219
INFO - 2022-04-25 13:56:04 --> Config Class Initialized
INFO - 2022-04-25 13:56:04 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:56:04 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:56:04 --> Utf8 Class Initialized
INFO - 2022-04-25 13:56:04 --> URI Class Initialized
INFO - 2022-04-25 13:56:04 --> Router Class Initialized
INFO - 2022-04-25 13:56:04 --> Output Class Initialized
INFO - 2022-04-25 13:56:04 --> Security Class Initialized
DEBUG - 2022-04-25 13:56:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:56:04 --> Input Class Initialized
INFO - 2022-04-25 13:56:04 --> Language Class Initialized
INFO - 2022-04-25 19:26:04 --> Loader Class Initialized
INFO - 2022-04-25 19:26:04 --> Helper loaded: url_helper
INFO - 2022-04-25 19:26:04 --> Helper loaded: file_helper
INFO - 2022-04-25 19:26:04 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:26:04 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:26:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:26:04 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:26:04 --> Upload Class Initialized
INFO - 2022-04-25 19:26:04 --> Table Class Initialized
INFO - 2022-04-25 19:26:04 --> Helper loaded: form_helper
INFO - 2022-04-25 19:26:04 --> Form Validation Class Initialized
INFO - 2022-04-25 19:26:04 --> Controller Class Initialized
INFO - 2022-04-25 19:26:04 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:26:04 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:26:13 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:26:13 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:26:13 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:26:13 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:26:13 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:26:13 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:13 --> Total execution time: 9.7695
INFO - 2022-04-25 13:56:14 --> Config Class Initialized
INFO - 2022-04-25 13:56:14 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:56:14 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:56:14 --> Utf8 Class Initialized
INFO - 2022-04-25 13:56:14 --> URI Class Initialized
INFO - 2022-04-25 13:56:14 --> Router Class Initialized
INFO - 2022-04-25 13:56:14 --> Output Class Initialized
INFO - 2022-04-25 13:56:14 --> Security Class Initialized
DEBUG - 2022-04-25 13:56:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:56:14 --> Input Class Initialized
INFO - 2022-04-25 13:56:14 --> Language Class Initialized
INFO - 2022-04-25 19:26:14 --> Loader Class Initialized
INFO - 2022-04-25 19:26:14 --> Helper loaded: url_helper
INFO - 2022-04-25 19:26:14 --> Helper loaded: file_helper
INFO - 2022-04-25 19:26:14 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:26:14 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:26:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:26:14 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:26:14 --> Upload Class Initialized
INFO - 2022-04-25 19:26:14 --> Table Class Initialized
INFO - 2022-04-25 19:26:14 --> Helper loaded: form_helper
INFO - 2022-04-25 19:26:14 --> Form Validation Class Initialized
INFO - 2022-04-25 19:26:14 --> Controller Class Initialized
INFO - 2022-04-25 19:26:14 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:26:14 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:26:23 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:26:23 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:26:23 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:26:23 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:26:23 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:26:23 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:23 --> Total execution time: 9.8169
INFO - 2022-04-25 13:56:24 --> Config Class Initialized
INFO - 2022-04-25 13:56:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:56:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:56:24 --> Utf8 Class Initialized
INFO - 2022-04-25 13:56:24 --> URI Class Initialized
INFO - 2022-04-25 13:56:24 --> Router Class Initialized
INFO - 2022-04-25 13:56:24 --> Output Class Initialized
INFO - 2022-04-25 13:56:24 --> Security Class Initialized
DEBUG - 2022-04-25 13:56:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:56:24 --> Input Class Initialized
INFO - 2022-04-25 13:56:24 --> Language Class Initialized
INFO - 2022-04-25 19:26:24 --> Loader Class Initialized
INFO - 2022-04-25 19:26:24 --> Helper loaded: url_helper
INFO - 2022-04-25 19:26:24 --> Helper loaded: file_helper
INFO - 2022-04-25 19:26:24 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:26:24 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:26:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:26:24 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:26:24 --> Upload Class Initialized
INFO - 2022-04-25 19:26:24 --> Table Class Initialized
INFO - 2022-04-25 19:26:24 --> Helper loaded: form_helper
INFO - 2022-04-25 19:26:24 --> Form Validation Class Initialized
INFO - 2022-04-25 19:26:24 --> Controller Class Initialized
INFO - 2022-04-25 19:26:24 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:26:24 --> Model "Common_model" initialized
ERROR - 2022-04-25 19:26:33 --> Severity: Notice --> Undefined index: EXPIRAY DATE /home/athealcpanel/public_html/application/controllers/Medicines.php 372
ERROR - 2022-04-25 19:26:33 --> Severity: Notice --> Undefined index: STOCK /home/athealcpanel/public_html/application/controllers/Medicines.php 398
ERROR - 2022-04-25 19:26:33 --> Severity: Notice --> Undefined index: AMOUNT /home/athealcpanel/public_html/application/controllers/Medicines.php 399
ERROR - 2022-04-25 19:26:33 --> Severity: Notice --> Undefined index: GST (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 400
ERROR - 2022-04-25 19:26:33 --> Severity: Notice --> Undefined index: DISCOUNT  (%) /home/athealcpanel/public_html/application/controllers/Medicines.php 413
INFO - 2022-04-25 19:26:33 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:33 --> Total execution time: 9.6087
INFO - 2022-04-25 13:56:34 --> Config Class Initialized
INFO - 2022-04-25 13:56:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:56:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:56:34 --> Utf8 Class Initialized
INFO - 2022-04-25 13:56:34 --> URI Class Initialized
INFO - 2022-04-25 13:56:34 --> Router Class Initialized
INFO - 2022-04-25 13:56:34 --> Output Class Initialized
INFO - 2022-04-25 13:56:34 --> Security Class Initialized
DEBUG - 2022-04-25 13:56:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:56:34 --> Input Class Initialized
INFO - 2022-04-25 13:56:34 --> Language Class Initialized
INFO - 2022-04-25 19:26:34 --> Loader Class Initialized
INFO - 2022-04-25 19:26:34 --> Helper loaded: url_helper
INFO - 2022-04-25 19:26:34 --> Helper loaded: file_helper
INFO - 2022-04-25 19:26:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:26:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:26:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:26:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:26:34 --> Upload Class Initialized
INFO - 2022-04-25 19:26:34 --> Table Class Initialized
INFO - 2022-04-25 19:26:34 --> Helper loaded: form_helper
INFO - 2022-04-25 19:26:34 --> Form Validation Class Initialized
INFO - 2022-04-25 19:26:34 --> Controller Class Initialized
INFO - 2022-04-25 19:26:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:26:34 --> Model "Common_model" initialized
INFO - 2022-04-25 19:26:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/header.php
INFO - 2022-04-25 19:26:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/sidebar.php
INFO - 2022-04-25 19:26:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/medicines/medicine_list.php
INFO - 2022-04-25 19:26:34 --> File loaded: /home/athealcpanel/public_html/application/views/partner/ptemplate/footer.php
INFO - 2022-04-25 19:26:34 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:34 --> Total execution time: 0.0638
INFO - 2022-04-25 13:56:34 --> Config Class Initialized
INFO - 2022-04-25 13:56:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:56:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:56:34 --> Utf8 Class Initialized
INFO - 2022-04-25 13:56:34 --> URI Class Initialized
INFO - 2022-04-25 13:56:34 --> Router Class Initialized
INFO - 2022-04-25 13:56:34 --> Output Class Initialized
INFO - 2022-04-25 13:56:34 --> Security Class Initialized
DEBUG - 2022-04-25 13:56:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:56:34 --> Input Class Initialized
INFO - 2022-04-25 13:56:34 --> Language Class Initialized
INFO - 2022-04-25 19:26:34 --> Loader Class Initialized
INFO - 2022-04-25 19:26:34 --> Helper loaded: url_helper
INFO - 2022-04-25 19:26:34 --> Helper loaded: file_helper
INFO - 2022-04-25 19:26:34 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:26:34 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:26:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:26:34 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:26:34 --> Upload Class Initialized
INFO - 2022-04-25 19:26:34 --> Table Class Initialized
INFO - 2022-04-25 19:26:34 --> Helper loaded: form_helper
INFO - 2022-04-25 19:26:34 --> Form Validation Class Initialized
INFO - 2022-04-25 19:26:34 --> Controller Class Initialized
INFO - 2022-04-25 19:26:34 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:26:34 --> Model "Common_model" initialized
INFO - 2022-04-25 19:26:34 --> Final output sent to browser
DEBUG - 2022-04-25 19:26:34 --> Total execution time: 0.0538
INFO - 2022-04-25 13:57:30 --> Config Class Initialized
INFO - 2022-04-25 13:57:30 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:57:30 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:57:30 --> Utf8 Class Initialized
INFO - 2022-04-25 13:57:30 --> URI Class Initialized
INFO - 2022-04-25 13:57:30 --> Router Class Initialized
INFO - 2022-04-25 13:57:30 --> Output Class Initialized
INFO - 2022-04-25 13:57:30 --> Security Class Initialized
DEBUG - 2022-04-25 13:57:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:57:30 --> Input Class Initialized
INFO - 2022-04-25 13:57:30 --> Language Class Initialized
INFO - 2022-04-25 19:27:30 --> Loader Class Initialized
INFO - 2022-04-25 19:27:30 --> Helper loaded: url_helper
INFO - 2022-04-25 19:27:30 --> Helper loaded: file_helper
INFO - 2022-04-25 19:27:30 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:27:30 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:27:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:27:30 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:27:30 --> Upload Class Initialized
INFO - 2022-04-25 19:27:30 --> Table Class Initialized
INFO - 2022-04-25 19:27:30 --> Helper loaded: form_helper
INFO - 2022-04-25 19:27:30 --> Form Validation Class Initialized
INFO - 2022-04-25 19:27:30 --> Controller Class Initialized
INFO - 2022-04-25 19:27:30 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:27:30 --> Model "Common_model" initialized
INFO - 2022-04-25 19:27:30 --> Final output sent to browser
DEBUG - 2022-04-25 19:27:30 --> Total execution time: 0.0739
INFO - 2022-04-25 13:57:40 --> Config Class Initialized
INFO - 2022-04-25 13:57:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:57:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:57:40 --> Utf8 Class Initialized
INFO - 2022-04-25 13:57:40 --> URI Class Initialized
INFO - 2022-04-25 13:57:40 --> Router Class Initialized
INFO - 2022-04-25 13:57:40 --> Output Class Initialized
INFO - 2022-04-25 13:57:40 --> Security Class Initialized
DEBUG - 2022-04-25 13:57:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:57:40 --> Input Class Initialized
INFO - 2022-04-25 13:57:40 --> Language Class Initialized
INFO - 2022-04-25 19:27:40 --> Loader Class Initialized
INFO - 2022-04-25 19:27:40 --> Helper loaded: url_helper
INFO - 2022-04-25 19:27:40 --> Helper loaded: file_helper
INFO - 2022-04-25 19:27:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:27:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:27:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:27:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:27:40 --> Upload Class Initialized
INFO - 2022-04-25 19:27:40 --> Table Class Initialized
INFO - 2022-04-25 19:27:40 --> Helper loaded: form_helper
INFO - 2022-04-25 19:27:40 --> Form Validation Class Initialized
INFO - 2022-04-25 19:27:40 --> Controller Class Initialized
INFO - 2022-04-25 19:27:40 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:27:40 --> Model "Common_model" initialized
INFO - 2022-04-25 19:27:40 --> Final output sent to browser
DEBUG - 2022-04-25 19:27:40 --> Total execution time: 0.0544
INFO - 2022-04-25 13:57:56 --> Config Class Initialized
INFO - 2022-04-25 13:57:56 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:57:56 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:57:56 --> Utf8 Class Initialized
INFO - 2022-04-25 13:57:56 --> URI Class Initialized
INFO - 2022-04-25 13:57:56 --> Router Class Initialized
INFO - 2022-04-25 13:57:56 --> Output Class Initialized
INFO - 2022-04-25 13:57:56 --> Security Class Initialized
DEBUG - 2022-04-25 13:57:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:57:56 --> Input Class Initialized
INFO - 2022-04-25 13:57:56 --> Language Class Initialized
INFO - 2022-04-25 19:27:56 --> Loader Class Initialized
INFO - 2022-04-25 19:27:56 --> Helper loaded: url_helper
INFO - 2022-04-25 19:27:56 --> Helper loaded: file_helper
INFO - 2022-04-25 19:27:56 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:27:56 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:27:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:27:56 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:27:56 --> Upload Class Initialized
INFO - 2022-04-25 19:27:56 --> Table Class Initialized
INFO - 2022-04-25 19:27:56 --> Helper loaded: form_helper
INFO - 2022-04-25 19:27:56 --> Form Validation Class Initialized
INFO - 2022-04-25 19:27:56 --> Controller Class Initialized
INFO - 2022-04-25 19:27:56 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:27:56 --> Model "Common_model" initialized
INFO - 2022-04-25 19:27:57 --> Final output sent to browser
DEBUG - 2022-04-25 19:27:57 --> Total execution time: 0.0702
INFO - 2022-04-25 13:58:00 --> Config Class Initialized
INFO - 2022-04-25 13:58:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:58:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:58:00 --> Utf8 Class Initialized
INFO - 2022-04-25 13:58:00 --> URI Class Initialized
INFO - 2022-04-25 13:58:00 --> Router Class Initialized
INFO - 2022-04-25 13:58:00 --> Output Class Initialized
INFO - 2022-04-25 13:58:00 --> Security Class Initialized
DEBUG - 2022-04-25 13:58:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:58:00 --> Input Class Initialized
INFO - 2022-04-25 13:58:00 --> Language Class Initialized
INFO - 2022-04-25 19:28:00 --> Loader Class Initialized
INFO - 2022-04-25 19:28:00 --> Helper loaded: url_helper
INFO - 2022-04-25 19:28:00 --> Helper loaded: file_helper
INFO - 2022-04-25 19:28:00 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:28:00 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:28:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:28:00 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:28:00 --> Upload Class Initialized
INFO - 2022-04-25 19:28:00 --> Table Class Initialized
INFO - 2022-04-25 19:28:00 --> Helper loaded: form_helper
INFO - 2022-04-25 19:28:00 --> Form Validation Class Initialized
INFO - 2022-04-25 19:28:00 --> Controller Class Initialized
INFO - 2022-04-25 19:28:00 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:28:00 --> Model "Common_model" initialized
INFO - 2022-04-25 19:28:00 --> Final output sent to browser
DEBUG - 2022-04-25 19:28:00 --> Total execution time: 0.0628
INFO - 2022-04-25 13:58:08 --> Config Class Initialized
INFO - 2022-04-25 13:58:08 --> Hooks Class Initialized
DEBUG - 2022-04-25 13:58:08 --> UTF-8 Support Enabled
INFO - 2022-04-25 13:58:08 --> Utf8 Class Initialized
INFO - 2022-04-25 13:58:08 --> URI Class Initialized
INFO - 2022-04-25 13:58:08 --> Router Class Initialized
INFO - 2022-04-25 13:58:08 --> Output Class Initialized
INFO - 2022-04-25 13:58:08 --> Security Class Initialized
DEBUG - 2022-04-25 13:58:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 13:58:08 --> Input Class Initialized
INFO - 2022-04-25 13:58:08 --> Language Class Initialized
INFO - 2022-04-25 19:28:08 --> Loader Class Initialized
INFO - 2022-04-25 19:28:08 --> Helper loaded: url_helper
INFO - 2022-04-25 19:28:08 --> Helper loaded: file_helper
INFO - 2022-04-25 19:28:08 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:28:08 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:28:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:28:08 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:28:08 --> Upload Class Initialized
INFO - 2022-04-25 19:28:08 --> Table Class Initialized
INFO - 2022-04-25 19:28:08 --> Helper loaded: form_helper
INFO - 2022-04-25 19:28:08 --> Form Validation Class Initialized
INFO - 2022-04-25 19:28:08 --> Controller Class Initialized
INFO - 2022-04-25 19:28:08 --> Model "Medicine_model" initialized
INFO - 2022-04-25 19:28:08 --> Model "Common_model" initialized
INFO - 2022-04-25 19:28:08 --> Final output sent to browser
DEBUG - 2022-04-25 19:28:08 --> Total execution time: 0.0620
INFO - 2022-04-25 14:18:02 --> Config Class Initialized
INFO - 2022-04-25 14:18:02 --> Hooks Class Initialized
DEBUG - 2022-04-25 14:18:02 --> UTF-8 Support Enabled
INFO - 2022-04-25 14:18:02 --> Utf8 Class Initialized
INFO - 2022-04-25 14:18:02 --> URI Class Initialized
DEBUG - 2022-04-25 14:18:02 --> No URI present. Default controller set.
INFO - 2022-04-25 14:18:02 --> Router Class Initialized
INFO - 2022-04-25 14:18:02 --> Output Class Initialized
INFO - 2022-04-25 14:18:02 --> Security Class Initialized
DEBUG - 2022-04-25 14:18:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 14:18:02 --> Input Class Initialized
INFO - 2022-04-25 14:18:02 --> Language Class Initialized
INFO - 2022-04-25 19:48:02 --> Loader Class Initialized
INFO - 2022-04-25 19:48:02 --> Helper loaded: url_helper
INFO - 2022-04-25 19:48:02 --> Helper loaded: file_helper
INFO - 2022-04-25 19:48:02 --> Helper loaded: genral_helper
INFO - 2022-04-25 19:48:02 --> Database Driver Class Initialized
DEBUG - 2022-04-25 19:48:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 19:48:02 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 19:48:02 --> Upload Class Initialized
INFO - 2022-04-25 19:48:02 --> Table Class Initialized
INFO - 2022-04-25 19:48:02 --> Helper loaded: form_helper
INFO - 2022-04-25 19:48:02 --> Form Validation Class Initialized
INFO - 2022-04-25 19:48:02 --> Controller Class Initialized
INFO - 2022-04-25 19:48:02 --> Model "Banner_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Features_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Speciality_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Admin_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Social_media_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Services_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Doctors_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Video_model" initialized
INFO - 2022-04-25 19:48:02 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 19:48:02 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 19:48:02 --> Final output sent to browser
DEBUG - 2022-04-25 19:48:02 --> Total execution time: 0.0083
INFO - 2022-04-25 15:00:40 --> Config Class Initialized
INFO - 2022-04-25 15:00:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:00:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:00:40 --> Utf8 Class Initialized
INFO - 2022-04-25 15:00:40 --> URI Class Initialized
INFO - 2022-04-25 15:00:40 --> Router Class Initialized
INFO - 2022-04-25 15:00:40 --> Output Class Initialized
INFO - 2022-04-25 15:00:40 --> Security Class Initialized
DEBUG - 2022-04-25 15:00:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:00:40 --> Input Class Initialized
INFO - 2022-04-25 15:00:40 --> Language Class Initialized
INFO - 2022-04-25 20:30:40 --> Loader Class Initialized
INFO - 2022-04-25 20:30:40 --> Helper loaded: url_helper
INFO - 2022-04-25 20:30:40 --> Helper loaded: file_helper
INFO - 2022-04-25 20:30:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:30:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:30:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:30:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:30:40 --> Upload Class Initialized
INFO - 2022-04-25 20:30:40 --> Table Class Initialized
INFO - 2022-04-25 20:30:40 --> Helper loaded: form_helper
INFO - 2022-04-25 20:30:40 --> Form Validation Class Initialized
INFO - 2022-04-25 20:30:40 --> Controller Class Initialized
INFO - 2022-04-25 20:30:40 --> Model "Api_model" initialized
INFO - 2022-04-25 20:30:40 --> Model "Common_model" initialized
INFO - 2022-04-25 20:30:40 --> Final output sent to browser
DEBUG - 2022-04-25 20:30:40 --> Total execution time: 0.0066
INFO - 2022-04-25 15:00:45 --> Config Class Initialized
INFO - 2022-04-25 15:00:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:00:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:00:45 --> Utf8 Class Initialized
INFO - 2022-04-25 15:00:45 --> URI Class Initialized
INFO - 2022-04-25 15:00:45 --> Router Class Initialized
INFO - 2022-04-25 15:00:45 --> Output Class Initialized
INFO - 2022-04-25 15:00:45 --> Security Class Initialized
DEBUG - 2022-04-25 15:00:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:00:45 --> Input Class Initialized
INFO - 2022-04-25 15:00:45 --> Language Class Initialized
INFO - 2022-04-25 20:30:45 --> Loader Class Initialized
INFO - 2022-04-25 20:30:45 --> Helper loaded: url_helper
INFO - 2022-04-25 20:30:45 --> Helper loaded: file_helper
INFO - 2022-04-25 20:30:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:30:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:30:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:30:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:30:45 --> Upload Class Initialized
INFO - 2022-04-25 20:30:45 --> Table Class Initialized
INFO - 2022-04-25 20:30:45 --> Helper loaded: form_helper
INFO - 2022-04-25 20:30:45 --> Form Validation Class Initialized
INFO - 2022-04-25 20:30:45 --> Controller Class Initialized
INFO - 2022-04-25 20:30:45 --> Model "Api_model" initialized
INFO - 2022-04-25 20:30:45 --> Model "Common_model" initialized
INFO - 2022-04-25 20:30:45 --> Final output sent to browser
DEBUG - 2022-04-25 20:30:45 --> Total execution time: 0.0043
INFO - 2022-04-25 15:06:36 --> Config Class Initialized
INFO - 2022-04-25 15:06:36 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:06:36 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:06:36 --> Utf8 Class Initialized
INFO - 2022-04-25 15:06:36 --> URI Class Initialized
DEBUG - 2022-04-25 15:06:36 --> No URI present. Default controller set.
INFO - 2022-04-25 15:06:36 --> Router Class Initialized
INFO - 2022-04-25 15:06:36 --> Output Class Initialized
INFO - 2022-04-25 15:06:36 --> Security Class Initialized
DEBUG - 2022-04-25 15:06:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:06:36 --> Input Class Initialized
INFO - 2022-04-25 15:06:36 --> Language Class Initialized
INFO - 2022-04-25 20:36:36 --> Loader Class Initialized
INFO - 2022-04-25 20:36:36 --> Helper loaded: url_helper
INFO - 2022-04-25 20:36:36 --> Helper loaded: file_helper
INFO - 2022-04-25 20:36:36 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:36:36 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:36:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:36:36 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:36:36 --> Upload Class Initialized
INFO - 2022-04-25 20:36:36 --> Table Class Initialized
INFO - 2022-04-25 20:36:36 --> Helper loaded: form_helper
INFO - 2022-04-25 20:36:36 --> Form Validation Class Initialized
INFO - 2022-04-25 20:36:36 --> Controller Class Initialized
INFO - 2022-04-25 20:36:36 --> Model "Banner_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Doctors_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Features_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Speciality_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Admin_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Social_media_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Services_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Doctors_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Video_model" initialized
INFO - 2022-04-25 20:36:36 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 20:36:36 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 20:36:36 --> Final output sent to browser
DEBUG - 2022-04-25 20:36:36 --> Total execution time: 0.0078
INFO - 2022-04-25 15:12:04 --> Config Class Initialized
INFO - 2022-04-25 15:12:04 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:12:04 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:12:04 --> Utf8 Class Initialized
INFO - 2022-04-25 15:12:04 --> URI Class Initialized
INFO - 2022-04-25 15:12:04 --> Router Class Initialized
INFO - 2022-04-25 15:12:04 --> Output Class Initialized
INFO - 2022-04-25 15:12:04 --> Security Class Initialized
DEBUG - 2022-04-25 15:12:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:12:04 --> Input Class Initialized
INFO - 2022-04-25 15:12:04 --> Language Class Initialized
ERROR - 2022-04-25 15:12:04 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:12:22 --> Config Class Initialized
INFO - 2022-04-25 15:12:22 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:12:22 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:12:22 --> Utf8 Class Initialized
INFO - 2022-04-25 15:12:22 --> URI Class Initialized
INFO - 2022-04-25 15:12:22 --> Router Class Initialized
INFO - 2022-04-25 15:12:22 --> Output Class Initialized
INFO - 2022-04-25 15:12:22 --> Security Class Initialized
DEBUG - 2022-04-25 15:12:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:12:22 --> Input Class Initialized
INFO - 2022-04-25 15:12:22 --> Language Class Initialized
ERROR - 2022-04-25 15:12:22 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:12:26 --> Config Class Initialized
INFO - 2022-04-25 15:12:26 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:12:26 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:12:26 --> Utf8 Class Initialized
INFO - 2022-04-25 15:12:26 --> URI Class Initialized
INFO - 2022-04-25 15:12:26 --> Router Class Initialized
INFO - 2022-04-25 15:12:26 --> Output Class Initialized
INFO - 2022-04-25 15:12:26 --> Security Class Initialized
DEBUG - 2022-04-25 15:12:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:12:26 --> Input Class Initialized
INFO - 2022-04-25 15:12:26 --> Language Class Initialized
ERROR - 2022-04-25 15:12:26 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:12:41 --> Config Class Initialized
INFO - 2022-04-25 15:12:41 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:12:41 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:12:41 --> Utf8 Class Initialized
INFO - 2022-04-25 15:12:41 --> URI Class Initialized
INFO - 2022-04-25 15:12:41 --> Router Class Initialized
INFO - 2022-04-25 15:12:41 --> Output Class Initialized
INFO - 2022-04-25 15:12:41 --> Security Class Initialized
DEBUG - 2022-04-25 15:12:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:12:41 --> Input Class Initialized
INFO - 2022-04-25 15:12:41 --> Language Class Initialized
ERROR - 2022-04-25 15:12:41 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:12:58 --> Config Class Initialized
INFO - 2022-04-25 15:12:58 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:12:58 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:12:58 --> Utf8 Class Initialized
INFO - 2022-04-25 15:12:58 --> URI Class Initialized
INFO - 2022-04-25 15:12:58 --> Router Class Initialized
INFO - 2022-04-25 15:12:58 --> Output Class Initialized
INFO - 2022-04-25 15:12:58 --> Security Class Initialized
DEBUG - 2022-04-25 15:12:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:12:58 --> Input Class Initialized
INFO - 2022-04-25 15:12:58 --> Language Class Initialized
ERROR - 2022-04-25 15:12:58 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:13:00 --> Config Class Initialized
INFO - 2022-04-25 15:13:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:13:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:13:00 --> Utf8 Class Initialized
INFO - 2022-04-25 15:13:00 --> URI Class Initialized
INFO - 2022-04-25 15:13:00 --> Router Class Initialized
INFO - 2022-04-25 15:13:00 --> Output Class Initialized
INFO - 2022-04-25 15:13:00 --> Security Class Initialized
DEBUG - 2022-04-25 15:13:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:13:00 --> Input Class Initialized
INFO - 2022-04-25 15:13:00 --> Language Class Initialized
ERROR - 2022-04-25 15:13:00 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 15:15:54 --> Config Class Initialized
INFO - 2022-04-25 15:15:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:15:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:15:54 --> Utf8 Class Initialized
INFO - 2022-04-25 15:15:54 --> URI Class Initialized
INFO - 2022-04-25 15:15:54 --> Router Class Initialized
INFO - 2022-04-25 15:15:54 --> Output Class Initialized
INFO - 2022-04-25 15:15:54 --> Security Class Initialized
DEBUG - 2022-04-25 15:15:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:15:54 --> Input Class Initialized
INFO - 2022-04-25 15:15:54 --> Language Class Initialized
INFO - 2022-04-25 20:45:54 --> Loader Class Initialized
INFO - 2022-04-25 20:45:54 --> Helper loaded: url_helper
INFO - 2022-04-25 20:45:54 --> Helper loaded: file_helper
INFO - 2022-04-25 20:45:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:45:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:45:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:45:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:45:54 --> Upload Class Initialized
INFO - 2022-04-25 20:45:54 --> Table Class Initialized
INFO - 2022-04-25 20:45:54 --> Helper loaded: form_helper
INFO - 2022-04-25 20:45:54 --> Form Validation Class Initialized
INFO - 2022-04-25 20:45:54 --> Controller Class Initialized
INFO - 2022-04-25 20:45:54 --> Model "Api_model" initialized
INFO - 2022-04-25 20:45:54 --> Model "Common_model" initialized
INFO - 2022-04-25 20:45:54 --> Final output sent to browser
DEBUG - 2022-04-25 20:45:54 --> Total execution time: 0.0078
INFO - 2022-04-25 15:15:57 --> Config Class Initialized
INFO - 2022-04-25 15:15:57 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:15:57 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:15:57 --> Utf8 Class Initialized
INFO - 2022-04-25 15:15:57 --> URI Class Initialized
INFO - 2022-04-25 15:15:57 --> Router Class Initialized
INFO - 2022-04-25 15:15:57 --> Output Class Initialized
INFO - 2022-04-25 15:15:57 --> Security Class Initialized
DEBUG - 2022-04-25 15:15:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:15:57 --> Input Class Initialized
INFO - 2022-04-25 15:15:57 --> Language Class Initialized
INFO - 2022-04-25 20:45:57 --> Loader Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: url_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: file_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:45:57 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:45:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:45:57 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:45:57 --> Upload Class Initialized
INFO - 2022-04-25 20:45:57 --> Table Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: form_helper
INFO - 2022-04-25 20:45:57 --> Form Validation Class Initialized
INFO - 2022-04-25 20:45:57 --> Controller Class Initialized
INFO - 2022-04-25 20:45:57 --> Model "Api_model" initialized
INFO - 2022-04-25 20:45:57 --> Model "Common_model" initialized
INFO - 2022-04-25 20:45:57 --> Final output sent to browser
DEBUG - 2022-04-25 20:45:57 --> Total execution time: 0.0034
INFO - 2022-04-25 15:15:57 --> Config Class Initialized
INFO - 2022-04-25 15:15:57 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:15:57 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:15:57 --> Utf8 Class Initialized
INFO - 2022-04-25 15:15:57 --> URI Class Initialized
INFO - 2022-04-25 15:15:57 --> Router Class Initialized
INFO - 2022-04-25 15:15:57 --> Output Class Initialized
INFO - 2022-04-25 15:15:57 --> Security Class Initialized
DEBUG - 2022-04-25 15:15:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:15:57 --> Input Class Initialized
INFO - 2022-04-25 15:15:57 --> Language Class Initialized
INFO - 2022-04-25 20:45:57 --> Loader Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: url_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: file_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:45:57 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:45:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:45:57 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:45:57 --> Upload Class Initialized
INFO - 2022-04-25 20:45:57 --> Table Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: form_helper
INFO - 2022-04-25 20:45:57 --> Form Validation Class Initialized
INFO - 2022-04-25 20:45:57 --> Controller Class Initialized
INFO - 2022-04-25 20:45:57 --> Model "Api_model" initialized
INFO - 2022-04-25 20:45:57 --> Model "Common_model" initialized
INFO - 2022-04-25 20:45:57 --> Final output sent to browser
DEBUG - 2022-04-25 20:45:57 --> Total execution time: 0.0027
INFO - 2022-04-25 15:15:57 --> Config Class Initialized
INFO - 2022-04-25 15:15:57 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:15:57 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:15:57 --> Utf8 Class Initialized
INFO - 2022-04-25 15:15:57 --> URI Class Initialized
INFO - 2022-04-25 15:15:57 --> Router Class Initialized
INFO - 2022-04-25 15:15:57 --> Output Class Initialized
INFO - 2022-04-25 15:15:57 --> Security Class Initialized
DEBUG - 2022-04-25 15:15:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:15:57 --> Input Class Initialized
INFO - 2022-04-25 15:15:57 --> Language Class Initialized
INFO - 2022-04-25 20:45:57 --> Loader Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: url_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: file_helper
INFO - 2022-04-25 20:45:57 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:45:57 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:45:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:45:57 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:45:57 --> Upload Class Initialized
INFO - 2022-04-25 20:45:57 --> Table Class Initialized
INFO - 2022-04-25 20:45:57 --> Helper loaded: form_helper
INFO - 2022-04-25 20:45:57 --> Form Validation Class Initialized
INFO - 2022-04-25 20:45:57 --> Controller Class Initialized
INFO - 2022-04-25 20:45:57 --> Model "Api_model" initialized
INFO - 2022-04-25 20:45:57 --> Model "Common_model" initialized
INFO - 2022-04-25 20:45:57 --> Final output sent to browser
DEBUG - 2022-04-25 20:45:57 --> Total execution time: 0.0077
INFO - 2022-04-25 15:16:01 --> Config Class Initialized
INFO - 2022-04-25 15:16:01 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:01 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:01 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:01 --> URI Class Initialized
INFO - 2022-04-25 15:16:01 --> Router Class Initialized
INFO - 2022-04-25 15:16:01 --> Output Class Initialized
INFO - 2022-04-25 15:16:01 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:01 --> Input Class Initialized
INFO - 2022-04-25 15:16:01 --> Language Class Initialized
INFO - 2022-04-25 20:46:01 --> Loader Class Initialized
INFO - 2022-04-25 20:46:01 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:01 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:01 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:01 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:01 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:01 --> Upload Class Initialized
INFO - 2022-04-25 20:46:01 --> Table Class Initialized
INFO - 2022-04-25 20:46:01 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:01 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:01 --> Controller Class Initialized
INFO - 2022-04-25 20:46:01 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:01 --> Model "Common_model" initialized
INFO - 2022-04-25 20:46:01 --> Final output sent to browser
DEBUG - 2022-04-25 20:46:01 --> Total execution time: 0.0117
INFO - 2022-04-25 15:16:05 --> Config Class Initialized
INFO - 2022-04-25 15:16:05 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:05 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:05 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:05 --> URI Class Initialized
INFO - 2022-04-25 15:16:05 --> Router Class Initialized
INFO - 2022-04-25 15:16:05 --> Output Class Initialized
INFO - 2022-04-25 15:16:05 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:05 --> Input Class Initialized
INFO - 2022-04-25 15:16:05 --> Language Class Initialized
INFO - 2022-04-25 20:46:05 --> Loader Class Initialized
INFO - 2022-04-25 20:46:05 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:05 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:05 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:05 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:05 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:05 --> Upload Class Initialized
INFO - 2022-04-25 20:46:05 --> Table Class Initialized
INFO - 2022-04-25 20:46:05 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:05 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:05 --> Controller Class Initialized
INFO - 2022-04-25 20:46:05 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:05 --> Model "Common_model" initialized
INFO - 2022-04-25 15:16:06 --> Config Class Initialized
INFO - 2022-04-25 15:16:06 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:06 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:06 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:06 --> URI Class Initialized
INFO - 2022-04-25 15:16:06 --> Router Class Initialized
INFO - 2022-04-25 15:16:06 --> Output Class Initialized
INFO - 2022-04-25 15:16:06 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:06 --> Input Class Initialized
INFO - 2022-04-25 15:16:06 --> Language Class Initialized
INFO - 2022-04-25 20:46:06 --> Loader Class Initialized
INFO - 2022-04-25 20:46:06 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:06 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:06 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:06 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:06 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:06 --> Upload Class Initialized
INFO - 2022-04-25 20:46:06 --> Table Class Initialized
INFO - 2022-04-25 20:46:06 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:06 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:06 --> Controller Class Initialized
INFO - 2022-04-25 20:46:06 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:06 --> Model "Common_model" initialized
INFO - 2022-04-25 15:16:07 --> Config Class Initialized
INFO - 2022-04-25 15:16:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:07 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:07 --> URI Class Initialized
INFO - 2022-04-25 15:16:07 --> Router Class Initialized
INFO - 2022-04-25 15:16:07 --> Output Class Initialized
INFO - 2022-04-25 15:16:07 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:07 --> Input Class Initialized
INFO - 2022-04-25 15:16:07 --> Language Class Initialized
INFO - 2022-04-25 20:46:07 --> Loader Class Initialized
INFO - 2022-04-25 20:46:07 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:07 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:07 --> Upload Class Initialized
INFO - 2022-04-25 20:46:07 --> Table Class Initialized
INFO - 2022-04-25 20:46:07 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:07 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:07 --> Controller Class Initialized
INFO - 2022-04-25 20:46:07 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:07 --> Model "Common_model" initialized
INFO - 2022-04-25 15:16:08 --> Config Class Initialized
INFO - 2022-04-25 15:16:08 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:08 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:08 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:08 --> URI Class Initialized
INFO - 2022-04-25 15:16:08 --> Router Class Initialized
INFO - 2022-04-25 15:16:08 --> Output Class Initialized
INFO - 2022-04-25 15:16:08 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:08 --> Input Class Initialized
INFO - 2022-04-25 15:16:08 --> Language Class Initialized
INFO - 2022-04-25 20:46:08 --> Loader Class Initialized
INFO - 2022-04-25 20:46:08 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:08 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:08 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:08 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:08 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:08 --> Upload Class Initialized
INFO - 2022-04-25 20:46:08 --> Table Class Initialized
INFO - 2022-04-25 20:46:08 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:08 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:08 --> Controller Class Initialized
INFO - 2022-04-25 20:46:08 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:08 --> Model "Common_model" initialized
INFO - 2022-04-25 15:16:09 --> Config Class Initialized
INFO - 2022-04-25 15:16:09 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:09 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:09 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:09 --> URI Class Initialized
INFO - 2022-04-25 15:16:09 --> Router Class Initialized
INFO - 2022-04-25 15:16:09 --> Output Class Initialized
INFO - 2022-04-25 15:16:09 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:09 --> Input Class Initialized
INFO - 2022-04-25 15:16:09 --> Language Class Initialized
INFO - 2022-04-25 20:46:09 --> Loader Class Initialized
INFO - 2022-04-25 20:46:09 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:09 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:09 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:09 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:09 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:09 --> Upload Class Initialized
INFO - 2022-04-25 20:46:09 --> Table Class Initialized
INFO - 2022-04-25 20:46:09 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:09 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:09 --> Controller Class Initialized
INFO - 2022-04-25 20:46:09 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:09 --> Model "Common_model" initialized
INFO - 2022-04-25 15:16:10 --> Config Class Initialized
INFO - 2022-04-25 15:16:10 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:16:10 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:16:10 --> Utf8 Class Initialized
INFO - 2022-04-25 15:16:10 --> URI Class Initialized
INFO - 2022-04-25 15:16:10 --> Router Class Initialized
INFO - 2022-04-25 15:16:10 --> Output Class Initialized
INFO - 2022-04-25 15:16:10 --> Security Class Initialized
DEBUG - 2022-04-25 15:16:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:16:10 --> Input Class Initialized
INFO - 2022-04-25 15:16:10 --> Language Class Initialized
INFO - 2022-04-25 20:46:10 --> Loader Class Initialized
INFO - 2022-04-25 20:46:10 --> Helper loaded: url_helper
INFO - 2022-04-25 20:46:10 --> Helper loaded: file_helper
INFO - 2022-04-25 20:46:10 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:46:10 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:46:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:46:10 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:46:10 --> Upload Class Initialized
INFO - 2022-04-25 20:46:10 --> Table Class Initialized
INFO - 2022-04-25 20:46:10 --> Helper loaded: form_helper
INFO - 2022-04-25 20:46:10 --> Form Validation Class Initialized
INFO - 2022-04-25 20:46:10 --> Controller Class Initialized
INFO - 2022-04-25 20:46:10 --> Model "Api_model" initialized
INFO - 2022-04-25 20:46:10 --> Model "Common_model" initialized
INFO - 2022-04-25 20:46:10 --> Final output sent to browser
DEBUG - 2022-04-25 20:46:10 --> Total execution time: 0.0104
INFO - 2022-04-25 15:17:19 --> Config Class Initialized
INFO - 2022-04-25 15:17:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 15:17:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 15:17:19 --> Utf8 Class Initialized
INFO - 2022-04-25 15:17:19 --> URI Class Initialized
DEBUG - 2022-04-25 15:17:19 --> No URI present. Default controller set.
INFO - 2022-04-25 15:17:19 --> Router Class Initialized
INFO - 2022-04-25 15:17:19 --> Output Class Initialized
INFO - 2022-04-25 15:17:19 --> Security Class Initialized
DEBUG - 2022-04-25 15:17:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 15:17:19 --> Input Class Initialized
INFO - 2022-04-25 15:17:19 --> Language Class Initialized
INFO - 2022-04-25 20:47:19 --> Loader Class Initialized
INFO - 2022-04-25 20:47:19 --> Helper loaded: url_helper
INFO - 2022-04-25 20:47:19 --> Helper loaded: file_helper
INFO - 2022-04-25 20:47:19 --> Helper loaded: genral_helper
INFO - 2022-04-25 20:47:19 --> Database Driver Class Initialized
DEBUG - 2022-04-25 20:47:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 20:47:19 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 20:47:19 --> Upload Class Initialized
INFO - 2022-04-25 20:47:19 --> Table Class Initialized
INFO - 2022-04-25 20:47:19 --> Helper loaded: form_helper
INFO - 2022-04-25 20:47:19 --> Form Validation Class Initialized
INFO - 2022-04-25 20:47:19 --> Controller Class Initialized
INFO - 2022-04-25 20:47:19 --> Model "Banner_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Doctors_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Features_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Speciality_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Admin_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Social_media_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Services_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Doctors_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Video_model" initialized
INFO - 2022-04-25 20:47:19 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 20:47:19 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 20:47:19 --> Final output sent to browser
DEBUG - 2022-04-25 20:47:19 --> Total execution time: 0.0078
INFO - 2022-04-25 16:39:54 --> Config Class Initialized
INFO - 2022-04-25 16:39:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 16:39:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 16:39:54 --> Utf8 Class Initialized
INFO - 2022-04-25 16:39:54 --> URI Class Initialized
DEBUG - 2022-04-25 16:39:54 --> No URI present. Default controller set.
INFO - 2022-04-25 16:39:54 --> Router Class Initialized
INFO - 2022-04-25 16:39:54 --> Output Class Initialized
INFO - 2022-04-25 16:39:54 --> Security Class Initialized
DEBUG - 2022-04-25 16:39:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 16:39:54 --> Input Class Initialized
INFO - 2022-04-25 16:39:54 --> Language Class Initialized
INFO - 2022-04-25 22:09:54 --> Loader Class Initialized
INFO - 2022-04-25 22:09:54 --> Helper loaded: url_helper
INFO - 2022-04-25 22:09:54 --> Helper loaded: file_helper
INFO - 2022-04-25 22:09:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 22:09:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 22:09:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 22:09:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 22:09:54 --> Upload Class Initialized
INFO - 2022-04-25 22:09:54 --> Table Class Initialized
INFO - 2022-04-25 22:09:54 --> Helper loaded: form_helper
INFO - 2022-04-25 22:09:54 --> Form Validation Class Initialized
INFO - 2022-04-25 22:09:54 --> Controller Class Initialized
INFO - 2022-04-25 22:09:54 --> Model "Banner_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Features_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Speciality_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Admin_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Social_media_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Services_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Video_model" initialized
INFO - 2022-04-25 22:09:54 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 22:09:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 22:09:54 --> Final output sent to browser
DEBUG - 2022-04-25 22:09:54 --> Total execution time: 0.0073
INFO - 2022-04-25 16:39:55 --> Config Class Initialized
INFO - 2022-04-25 16:39:55 --> Hooks Class Initialized
DEBUG - 2022-04-25 16:39:55 --> UTF-8 Support Enabled
INFO - 2022-04-25 16:39:55 --> Utf8 Class Initialized
INFO - 2022-04-25 16:39:55 --> URI Class Initialized
INFO - 2022-04-25 16:39:55 --> Router Class Initialized
INFO - 2022-04-25 16:39:55 --> Output Class Initialized
INFO - 2022-04-25 16:39:55 --> Security Class Initialized
DEBUG - 2022-04-25 16:39:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 16:39:55 --> Input Class Initialized
INFO - 2022-04-25 16:39:55 --> Language Class Initialized
ERROR - 2022-04-25 16:39:55 --> 404 Page Not Found: Faviconico/index
INFO - 2022-04-25 17:16:32 --> Config Class Initialized
INFO - 2022-04-25 17:16:32 --> Hooks Class Initialized
DEBUG - 2022-04-25 17:16:32 --> UTF-8 Support Enabled
INFO - 2022-04-25 17:16:32 --> Utf8 Class Initialized
INFO - 2022-04-25 17:16:32 --> URI Class Initialized
DEBUG - 2022-04-25 17:16:32 --> No URI present. Default controller set.
INFO - 2022-04-25 17:16:32 --> Router Class Initialized
INFO - 2022-04-25 17:16:32 --> Output Class Initialized
INFO - 2022-04-25 17:16:32 --> Security Class Initialized
DEBUG - 2022-04-25 17:16:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 17:16:32 --> Input Class Initialized
INFO - 2022-04-25 17:16:32 --> Language Class Initialized
INFO - 2022-04-25 22:46:32 --> Loader Class Initialized
INFO - 2022-04-25 22:46:32 --> Helper loaded: url_helper
INFO - 2022-04-25 22:46:32 --> Helper loaded: file_helper
INFO - 2022-04-25 22:46:32 --> Helper loaded: genral_helper
INFO - 2022-04-25 22:46:32 --> Database Driver Class Initialized
DEBUG - 2022-04-25 22:46:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 22:46:32 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 22:46:32 --> Upload Class Initialized
INFO - 2022-04-25 22:46:32 --> Table Class Initialized
INFO - 2022-04-25 22:46:32 --> Helper loaded: form_helper
INFO - 2022-04-25 22:46:32 --> Form Validation Class Initialized
INFO - 2022-04-25 22:46:32 --> Controller Class Initialized
INFO - 2022-04-25 22:46:32 --> Model "Banner_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Features_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Speciality_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Admin_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Social_media_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Services_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Video_model" initialized
INFO - 2022-04-25 22:46:32 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 22:46:32 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 22:46:32 --> Final output sent to browser
DEBUG - 2022-04-25 22:46:32 --> Total execution time: 0.0082
INFO - 2022-04-25 17:16:54 --> Config Class Initialized
INFO - 2022-04-25 17:16:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 17:16:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 17:16:54 --> Utf8 Class Initialized
INFO - 2022-04-25 17:16:54 --> URI Class Initialized
DEBUG - 2022-04-25 17:16:54 --> No URI present. Default controller set.
INFO - 2022-04-25 17:16:54 --> Router Class Initialized
INFO - 2022-04-25 17:16:54 --> Output Class Initialized
INFO - 2022-04-25 17:16:54 --> Security Class Initialized
DEBUG - 2022-04-25 17:16:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 17:16:54 --> Input Class Initialized
INFO - 2022-04-25 17:16:54 --> Language Class Initialized
INFO - 2022-04-25 22:46:54 --> Loader Class Initialized
INFO - 2022-04-25 22:46:54 --> Helper loaded: url_helper
INFO - 2022-04-25 22:46:54 --> Helper loaded: file_helper
INFO - 2022-04-25 22:46:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 22:46:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 22:46:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 22:46:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 22:46:54 --> Upload Class Initialized
INFO - 2022-04-25 22:46:54 --> Table Class Initialized
INFO - 2022-04-25 22:46:54 --> Helper loaded: form_helper
INFO - 2022-04-25 22:46:54 --> Form Validation Class Initialized
INFO - 2022-04-25 22:46:54 --> Controller Class Initialized
INFO - 2022-04-25 22:46:54 --> Model "Banner_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Features_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Speciality_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Admin_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Social_media_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Services_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Video_model" initialized
INFO - 2022-04-25 22:46:54 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 22:46:54 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 22:46:54 --> Final output sent to browser
DEBUG - 2022-04-25 22:46:54 --> Total execution time: 0.0068
INFO - 2022-04-25 17:17:41 --> Config Class Initialized
INFO - 2022-04-25 17:17:41 --> Hooks Class Initialized
DEBUG - 2022-04-25 17:17:41 --> UTF-8 Support Enabled
INFO - 2022-04-25 17:17:41 --> Utf8 Class Initialized
INFO - 2022-04-25 17:17:41 --> URI Class Initialized
DEBUG - 2022-04-25 17:17:41 --> No URI present. Default controller set.
INFO - 2022-04-25 17:17:41 --> Router Class Initialized
INFO - 2022-04-25 17:17:41 --> Output Class Initialized
INFO - 2022-04-25 17:17:41 --> Security Class Initialized
DEBUG - 2022-04-25 17:17:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 17:17:41 --> Input Class Initialized
INFO - 2022-04-25 17:17:41 --> Language Class Initialized
INFO - 2022-04-25 22:47:41 --> Loader Class Initialized
INFO - 2022-04-25 22:47:41 --> Helper loaded: url_helper
INFO - 2022-04-25 22:47:41 --> Helper loaded: file_helper
INFO - 2022-04-25 22:47:41 --> Helper loaded: genral_helper
INFO - 2022-04-25 22:47:41 --> Database Driver Class Initialized
DEBUG - 2022-04-25 22:47:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 22:47:41 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 22:47:41 --> Upload Class Initialized
INFO - 2022-04-25 22:47:41 --> Table Class Initialized
INFO - 2022-04-25 22:47:41 --> Helper loaded: form_helper
INFO - 2022-04-25 22:47:41 --> Form Validation Class Initialized
INFO - 2022-04-25 22:47:41 --> Controller Class Initialized
INFO - 2022-04-25 22:47:41 --> Model "Banner_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Features_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Speciality_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Admin_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Social_media_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Services_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Doctors_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Video_model" initialized
INFO - 2022-04-25 22:47:41 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 22:47:41 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 22:47:41 --> Final output sent to browser
DEBUG - 2022-04-25 22:47:41 --> Total execution time: 0.0069
INFO - 2022-04-25 17:42:05 --> Config Class Initialized
INFO - 2022-04-25 17:42:05 --> Hooks Class Initialized
DEBUG - 2022-04-25 17:42:05 --> UTF-8 Support Enabled
INFO - 2022-04-25 17:42:05 --> Utf8 Class Initialized
INFO - 2022-04-25 17:42:05 --> URI Class Initialized
INFO - 2022-04-25 17:42:05 --> Router Class Initialized
INFO - 2022-04-25 17:42:05 --> Output Class Initialized
INFO - 2022-04-25 17:42:05 --> Security Class Initialized
DEBUG - 2022-04-25 17:42:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 17:42:05 --> Input Class Initialized
INFO - 2022-04-25 17:42:05 --> Language Class Initialized
ERROR - 2022-04-25 17:42:05 --> 404 Page Not Found: GponForm/diag_Form
INFO - 2022-04-25 17:58:00 --> Config Class Initialized
INFO - 2022-04-25 17:58:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 17:58:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 17:58:00 --> Utf8 Class Initialized
INFO - 2022-04-25 17:58:00 --> URI Class Initialized
DEBUG - 2022-04-25 17:58:00 --> No URI present. Default controller set.
INFO - 2022-04-25 17:58:00 --> Router Class Initialized
INFO - 2022-04-25 17:58:00 --> Output Class Initialized
INFO - 2022-04-25 17:58:00 --> Security Class Initialized
DEBUG - 2022-04-25 17:58:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 17:58:00 --> Input Class Initialized
INFO - 2022-04-25 17:58:00 --> Language Class Initialized
INFO - 2022-04-25 23:28:00 --> Loader Class Initialized
INFO - 2022-04-25 23:28:00 --> Helper loaded: url_helper
INFO - 2022-04-25 23:28:00 --> Helper loaded: file_helper
INFO - 2022-04-25 23:28:00 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:28:00 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:28:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:28:00 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:28:00 --> Upload Class Initialized
INFO - 2022-04-25 23:28:00 --> Table Class Initialized
INFO - 2022-04-25 23:28:00 --> Helper loaded: form_helper
INFO - 2022-04-25 23:28:00 --> Form Validation Class Initialized
INFO - 2022-04-25 23:28:00 --> Controller Class Initialized
INFO - 2022-04-25 23:28:00 --> Model "Banner_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Doctors_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Features_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Speciality_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Admin_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Social_media_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Services_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Doctors_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Video_model" initialized
INFO - 2022-04-25 23:28:00 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 23:28:00 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 23:28:00 --> Final output sent to browser
DEBUG - 2022-04-25 23:28:00 --> Total execution time: 0.0078
INFO - 2022-04-25 18:02:20 --> Config Class Initialized
INFO - 2022-04-25 18:02:20 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:02:20 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:02:20 --> Utf8 Class Initialized
INFO - 2022-04-25 18:02:20 --> URI Class Initialized
DEBUG - 2022-04-25 18:02:20 --> No URI present. Default controller set.
INFO - 2022-04-25 18:02:20 --> Router Class Initialized
INFO - 2022-04-25 18:02:20 --> Output Class Initialized
INFO - 2022-04-25 18:02:20 --> Security Class Initialized
DEBUG - 2022-04-25 18:02:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:02:20 --> Input Class Initialized
INFO - 2022-04-25 18:02:20 --> Language Class Initialized
INFO - 2022-04-25 23:32:20 --> Loader Class Initialized
INFO - 2022-04-25 23:32:20 --> Helper loaded: url_helper
INFO - 2022-04-25 23:32:20 --> Helper loaded: file_helper
INFO - 2022-04-25 23:32:20 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:32:20 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:32:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:32:20 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:32:20 --> Upload Class Initialized
INFO - 2022-04-25 23:32:20 --> Table Class Initialized
INFO - 2022-04-25 23:32:20 --> Helper loaded: form_helper
INFO - 2022-04-25 23:32:20 --> Form Validation Class Initialized
INFO - 2022-04-25 23:32:20 --> Controller Class Initialized
INFO - 2022-04-25 23:32:20 --> Model "Banner_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Testimonials_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Doctors_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Features_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Speciality_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Admin_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Social_media_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Services_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Doctors_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Video_model" initialized
INFO - 2022-04-25 23:32:20 --> Model "Cmspages_model" initialized
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtag.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_css.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/gtagbody.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_header.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_facts.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_footer.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/common_js.php
INFO - 2022-04-25 23:32:20 --> File loaded: /home/athealcpanel/public_html/application/views/front/index.php
INFO - 2022-04-25 23:32:20 --> Final output sent to browser
DEBUG - 2022-04-25 23:32:20 --> Total execution time: 0.0079
INFO - 2022-04-25 18:18:06 --> Config Class Initialized
INFO - 2022-04-25 18:18:06 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:06 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:06 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:06 --> URI Class Initialized
INFO - 2022-04-25 18:18:06 --> Router Class Initialized
INFO - 2022-04-25 18:18:06 --> Output Class Initialized
INFO - 2022-04-25 18:18:06 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:06 --> Input Class Initialized
INFO - 2022-04-25 18:18:06 --> Language Class Initialized
INFO - 2022-04-25 23:48:06 --> Loader Class Initialized
INFO - 2022-04-25 23:48:06 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:06 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:06 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:06 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:06 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:06 --> Upload Class Initialized
INFO - 2022-04-25 23:48:06 --> Table Class Initialized
INFO - 2022-04-25 23:48:06 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:06 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:06 --> Controller Class Initialized
INFO - 2022-04-25 23:48:06 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:06 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:06 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:06 --> Total execution time: 0.0073
INFO - 2022-04-25 18:18:07 --> Config Class Initialized
INFO - 2022-04-25 18:18:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:07 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:07 --> URI Class Initialized
INFO - 2022-04-25 18:18:07 --> Router Class Initialized
INFO - 2022-04-25 18:18:07 --> Output Class Initialized
INFO - 2022-04-25 18:18:07 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:07 --> Input Class Initialized
INFO - 2022-04-25 18:18:07 --> Language Class Initialized
INFO - 2022-04-25 23:48:07 --> Loader Class Initialized
INFO - 2022-04-25 23:48:07 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:07 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:07 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:07 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:07 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:07 --> Upload Class Initialized
INFO - 2022-04-25 23:48:07 --> Table Class Initialized
INFO - 2022-04-25 23:48:07 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:07 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:07 --> Controller Class Initialized
INFO - 2022-04-25 23:48:07 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:07 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:07 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:07 --> Total execution time: 0.0033
INFO - 2022-04-25 18:18:08 --> Config Class Initialized
INFO - 2022-04-25 18:18:08 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:08 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:08 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:08 --> URI Class Initialized
INFO - 2022-04-25 18:18:08 --> Router Class Initialized
INFO - 2022-04-25 18:18:08 --> Output Class Initialized
INFO - 2022-04-25 18:18:08 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:08 --> Input Class Initialized
INFO - 2022-04-25 18:18:08 --> Language Class Initialized
INFO - 2022-04-25 23:48:08 --> Loader Class Initialized
INFO - 2022-04-25 23:48:08 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:08 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:08 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:08 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:08 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:08 --> Upload Class Initialized
INFO - 2022-04-25 23:48:08 --> Table Class Initialized
INFO - 2022-04-25 23:48:08 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:08 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:08 --> Controller Class Initialized
INFO - 2022-04-25 23:48:08 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:08 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:08 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:08 --> Total execution time: 0.0032
INFO - 2022-04-25 18:18:08 --> Config Class Initialized
INFO - 2022-04-25 18:18:08 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:08 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:08 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:08 --> URI Class Initialized
INFO - 2022-04-25 18:18:08 --> Router Class Initialized
INFO - 2022-04-25 18:18:08 --> Output Class Initialized
INFO - 2022-04-25 18:18:08 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:08 --> Input Class Initialized
INFO - 2022-04-25 18:18:08 --> Language Class Initialized
INFO - 2022-04-25 23:48:08 --> Loader Class Initialized
INFO - 2022-04-25 23:48:08 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:08 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:08 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:08 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:08 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:08 --> Upload Class Initialized
INFO - 2022-04-25 23:48:08 --> Table Class Initialized
INFO - 2022-04-25 23:48:08 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:08 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:08 --> Controller Class Initialized
INFO - 2022-04-25 23:48:08 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:08 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:08 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:08 --> Total execution time: 0.0067
INFO - 2022-04-25 18:18:13 --> Config Class Initialized
INFO - 2022-04-25 18:18:13 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:13 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:13 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:13 --> URI Class Initialized
INFO - 2022-04-25 18:18:13 --> Router Class Initialized
INFO - 2022-04-25 18:18:13 --> Output Class Initialized
INFO - 2022-04-25 18:18:13 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:13 --> Input Class Initialized
INFO - 2022-04-25 18:18:13 --> Language Class Initialized
INFO - 2022-04-25 23:48:13 --> Loader Class Initialized
INFO - 2022-04-25 23:48:13 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:13 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:13 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:13 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:13 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:13 --> Upload Class Initialized
INFO - 2022-04-25 23:48:13 --> Table Class Initialized
INFO - 2022-04-25 23:48:13 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:13 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:13 --> Controller Class Initialized
INFO - 2022-04-25 23:48:13 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:13 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:13 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:13 --> Total execution time: 0.0041
INFO - 2022-04-25 18:18:13 --> Config Class Initialized
INFO - 2022-04-25 18:18:13 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:13 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:13 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:13 --> URI Class Initialized
INFO - 2022-04-25 18:18:13 --> Router Class Initialized
INFO - 2022-04-25 18:18:13 --> Output Class Initialized
INFO - 2022-04-25 18:18:13 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:13 --> Input Class Initialized
INFO - 2022-04-25 18:18:13 --> Language Class Initialized
INFO - 2022-04-25 23:48:13 --> Loader Class Initialized
INFO - 2022-04-25 23:48:13 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:13 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:13 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:13 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:13 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:13 --> Upload Class Initialized
INFO - 2022-04-25 23:48:13 --> Table Class Initialized
INFO - 2022-04-25 23:48:13 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:13 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:13 --> Controller Class Initialized
INFO - 2022-04-25 23:48:13 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:13 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:13 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:13 --> Total execution time: 0.0046
INFO - 2022-04-25 18:18:19 --> Config Class Initialized
INFO - 2022-04-25 18:18:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:19 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:19 --> URI Class Initialized
INFO - 2022-04-25 18:18:19 --> Router Class Initialized
INFO - 2022-04-25 18:18:19 --> Output Class Initialized
INFO - 2022-04-25 18:18:19 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:19 --> Input Class Initialized
INFO - 2022-04-25 18:18:19 --> Language Class Initialized
INFO - 2022-04-25 23:48:19 --> Loader Class Initialized
INFO - 2022-04-25 23:48:19 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:19 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:19 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:19 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:19 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:19 --> Upload Class Initialized
INFO - 2022-04-25 23:48:19 --> Table Class Initialized
INFO - 2022-04-25 23:48:19 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:19 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:19 --> Controller Class Initialized
INFO - 2022-04-25 23:48:19 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:19 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:19 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:19 --> Total execution time: 0.2064
INFO - 2022-04-25 18:18:22 --> Config Class Initialized
INFO - 2022-04-25 18:18:22 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:22 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:22 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:22 --> URI Class Initialized
INFO - 2022-04-25 18:18:22 --> Router Class Initialized
INFO - 2022-04-25 18:18:22 --> Output Class Initialized
INFO - 2022-04-25 18:18:22 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:22 --> Input Class Initialized
INFO - 2022-04-25 18:18:22 --> Language Class Initialized
INFO - 2022-04-25 23:48:22 --> Loader Class Initialized
INFO - 2022-04-25 23:48:22 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:22 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:22 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:22 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:22 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:22 --> Upload Class Initialized
INFO - 2022-04-25 23:48:22 --> Table Class Initialized
INFO - 2022-04-25 23:48:22 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:22 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:22 --> Controller Class Initialized
INFO - 2022-04-25 23:48:22 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:22 --> Model "Common_model" initialized
INFO - 2022-04-25 18:18:24 --> Config Class Initialized
INFO - 2022-04-25 18:18:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:24 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:24 --> URI Class Initialized
INFO - 2022-04-25 18:18:24 --> Router Class Initialized
INFO - 2022-04-25 18:18:24 --> Output Class Initialized
INFO - 2022-04-25 18:18:24 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:24 --> Input Class Initialized
INFO - 2022-04-25 18:18:24 --> Language Class Initialized
INFO - 2022-04-25 23:48:24 --> Loader Class Initialized
INFO - 2022-04-25 23:48:24 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:24 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:24 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:24 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:24 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:24 --> Upload Class Initialized
INFO - 2022-04-25 23:48:24 --> Table Class Initialized
INFO - 2022-04-25 23:48:24 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:24 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:24 --> Controller Class Initialized
INFO - 2022-04-25 23:48:24 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:24 --> Model "Common_model" initialized
INFO - 2022-04-25 18:18:33 --> Config Class Initialized
INFO - 2022-04-25 18:18:33 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:33 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:33 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:33 --> URI Class Initialized
INFO - 2022-04-25 18:18:33 --> Router Class Initialized
INFO - 2022-04-25 18:18:33 --> Output Class Initialized
INFO - 2022-04-25 18:18:33 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:33 --> Input Class Initialized
INFO - 2022-04-25 18:18:33 --> Language Class Initialized
INFO - 2022-04-25 23:48:33 --> Loader Class Initialized
INFO - 2022-04-25 23:48:33 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:33 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:33 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:33 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:33 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:33 --> Upload Class Initialized
INFO - 2022-04-25 23:48:33 --> Table Class Initialized
INFO - 2022-04-25 23:48:33 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:33 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:33 --> Controller Class Initialized
INFO - 2022-04-25 23:48:33 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:33 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:33 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:33 --> Total execution time: 0.0039
INFO - 2022-04-25 18:18:40 --> Config Class Initialized
INFO - 2022-04-25 18:18:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:18:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:18:40 --> Utf8 Class Initialized
INFO - 2022-04-25 18:18:40 --> URI Class Initialized
INFO - 2022-04-25 18:18:40 --> Router Class Initialized
INFO - 2022-04-25 18:18:40 --> Output Class Initialized
INFO - 2022-04-25 18:18:40 --> Security Class Initialized
DEBUG - 2022-04-25 18:18:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:18:40 --> Input Class Initialized
INFO - 2022-04-25 18:18:40 --> Language Class Initialized
INFO - 2022-04-25 23:48:40 --> Loader Class Initialized
INFO - 2022-04-25 23:48:40 --> Helper loaded: url_helper
INFO - 2022-04-25 23:48:40 --> Helper loaded: file_helper
INFO - 2022-04-25 23:48:40 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:48:40 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:48:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:48:40 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:48:40 --> Upload Class Initialized
INFO - 2022-04-25 23:48:40 --> Table Class Initialized
INFO - 2022-04-25 23:48:40 --> Helper loaded: form_helper
INFO - 2022-04-25 23:48:40 --> Form Validation Class Initialized
INFO - 2022-04-25 23:48:40 --> Controller Class Initialized
INFO - 2022-04-25 23:48:40 --> Model "Api_model" initialized
INFO - 2022-04-25 23:48:40 --> Model "Common_model" initialized
INFO - 2022-04-25 23:48:40 --> Final output sent to browser
DEBUG - 2022-04-25 23:48:40 --> Total execution time: 0.0074
INFO - 2022-04-25 18:23:42 --> Config Class Initialized
INFO - 2022-04-25 18:23:42 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:42 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:42 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:42 --> URI Class Initialized
INFO - 2022-04-25 18:23:42 --> Router Class Initialized
INFO - 2022-04-25 18:23:42 --> Output Class Initialized
INFO - 2022-04-25 18:23:42 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:42 --> Input Class Initialized
INFO - 2022-04-25 18:23:42 --> Language Class Initialized
INFO - 2022-04-25 23:53:42 --> Loader Class Initialized
INFO - 2022-04-25 23:53:42 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:42 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:42 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:42 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:42 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:42 --> Upload Class Initialized
INFO - 2022-04-25 23:53:42 --> Table Class Initialized
INFO - 2022-04-25 23:53:42 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:42 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:42 --> Controller Class Initialized
INFO - 2022-04-25 23:53:42 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:42 --> Model "Common_model" initialized
INFO - 2022-04-25 23:53:42 --> Final output sent to browser
DEBUG - 2022-04-25 23:53:42 --> Total execution time: 0.0057
INFO - 2022-04-25 18:23:44 --> Config Class Initialized
INFO - 2022-04-25 18:23:44 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:44 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:44 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:44 --> URI Class Initialized
INFO - 2022-04-25 18:23:44 --> Router Class Initialized
INFO - 2022-04-25 18:23:44 --> Output Class Initialized
INFO - 2022-04-25 18:23:44 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:44 --> Input Class Initialized
INFO - 2022-04-25 18:23:44 --> Language Class Initialized
INFO - 2022-04-25 23:53:44 --> Loader Class Initialized
INFO - 2022-04-25 23:53:44 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:44 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:44 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:44 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:44 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:44 --> Upload Class Initialized
INFO - 2022-04-25 23:53:44 --> Table Class Initialized
INFO - 2022-04-25 23:53:44 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:44 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:44 --> Controller Class Initialized
INFO - 2022-04-25 23:53:44 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:44 --> Model "Common_model" initialized
INFO - 2022-04-25 23:53:44 --> Final output sent to browser
DEBUG - 2022-04-25 23:53:44 --> Total execution time: 0.0036
INFO - 2022-04-25 18:23:44 --> Config Class Initialized
INFO - 2022-04-25 18:23:44 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:44 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:44 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:44 --> URI Class Initialized
INFO - 2022-04-25 18:23:44 --> Router Class Initialized
INFO - 2022-04-25 18:23:44 --> Output Class Initialized
INFO - 2022-04-25 18:23:44 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:44 --> Input Class Initialized
INFO - 2022-04-25 18:23:44 --> Language Class Initialized
INFO - 2022-04-25 23:53:44 --> Loader Class Initialized
INFO - 2022-04-25 23:53:44 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:44 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:44 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:44 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:44 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:44 --> Upload Class Initialized
INFO - 2022-04-25 23:53:44 --> Table Class Initialized
INFO - 2022-04-25 23:53:44 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:44 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:44 --> Controller Class Initialized
INFO - 2022-04-25 23:53:44 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:44 --> Model "Common_model" initialized
INFO - 2022-04-25 23:53:44 --> Final output sent to browser
DEBUG - 2022-04-25 23:53:44 --> Total execution time: 0.0032
INFO - 2022-04-25 18:23:45 --> Config Class Initialized
INFO - 2022-04-25 18:23:45 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:45 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:45 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:45 --> URI Class Initialized
INFO - 2022-04-25 18:23:45 --> Router Class Initialized
INFO - 2022-04-25 18:23:45 --> Output Class Initialized
INFO - 2022-04-25 18:23:45 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:45 --> Input Class Initialized
INFO - 2022-04-25 18:23:45 --> Language Class Initialized
INFO - 2022-04-25 23:53:45 --> Loader Class Initialized
INFO - 2022-04-25 23:53:45 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:45 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:45 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:45 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:45 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:45 --> Upload Class Initialized
INFO - 2022-04-25 23:53:45 --> Table Class Initialized
INFO - 2022-04-25 23:53:45 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:45 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:45 --> Controller Class Initialized
INFO - 2022-04-25 23:53:45 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:45 --> Model "Common_model" initialized
INFO - 2022-04-25 18:23:54 --> Config Class Initialized
INFO - 2022-04-25 18:23:54 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:54 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:54 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:54 --> URI Class Initialized
INFO - 2022-04-25 18:23:54 --> Router Class Initialized
INFO - 2022-04-25 18:23:54 --> Output Class Initialized
INFO - 2022-04-25 18:23:54 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:54 --> Input Class Initialized
INFO - 2022-04-25 18:23:54 --> Language Class Initialized
INFO - 2022-04-25 23:53:54 --> Loader Class Initialized
INFO - 2022-04-25 23:53:54 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:54 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:54 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:54 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:54 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:54 --> Upload Class Initialized
INFO - 2022-04-25 23:53:54 --> Table Class Initialized
INFO - 2022-04-25 23:53:54 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:54 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:54 --> Controller Class Initialized
INFO - 2022-04-25 23:53:54 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:54 --> Model "Common_model" initialized
INFO - 2022-04-25 18:23:59 --> Config Class Initialized
INFO - 2022-04-25 18:23:59 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:23:59 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:23:59 --> Utf8 Class Initialized
INFO - 2022-04-25 18:23:59 --> URI Class Initialized
INFO - 2022-04-25 18:23:59 --> Router Class Initialized
INFO - 2022-04-25 18:23:59 --> Output Class Initialized
INFO - 2022-04-25 18:23:59 --> Security Class Initialized
DEBUG - 2022-04-25 18:23:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:23:59 --> Input Class Initialized
INFO - 2022-04-25 18:23:59 --> Language Class Initialized
INFO - 2022-04-25 23:53:59 --> Loader Class Initialized
INFO - 2022-04-25 23:53:59 --> Helper loaded: url_helper
INFO - 2022-04-25 23:53:59 --> Helper loaded: file_helper
INFO - 2022-04-25 23:53:59 --> Helper loaded: genral_helper
INFO - 2022-04-25 23:53:59 --> Database Driver Class Initialized
DEBUG - 2022-04-25 23:53:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2022-04-25 23:53:59 --> Session: Class initialized using 'files' driver.
INFO - 2022-04-25 23:53:59 --> Upload Class Initialized
INFO - 2022-04-25 23:53:59 --> Table Class Initialized
INFO - 2022-04-25 23:53:59 --> Helper loaded: form_helper
INFO - 2022-04-25 23:53:59 --> Form Validation Class Initialized
INFO - 2022-04-25 23:53:59 --> Controller Class Initialized
INFO - 2022-04-25 23:53:59 --> Model "Api_model" initialized
INFO - 2022-04-25 23:53:59 --> Model "Common_model" initialized
INFO - 2022-04-25 23:53:59 --> Final output sent to browser
DEBUG - 2022-04-25 23:53:59 --> Total execution time: 0.0036
INFO - 2022-04-25 18:44:07 --> Config Class Initialized
INFO - 2022-04-25 18:44:07 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:44:07 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:44:07 --> Utf8 Class Initialized
INFO - 2022-04-25 18:44:07 --> URI Class Initialized
DEBUG - 2022-04-25 18:44:07 --> No URI present. Default controller set.
INFO - 2022-04-25 18:44:07 --> Router Class Initialized
INFO - 2022-04-25 18:44:07 --> Output Class Initialized
INFO - 2022-04-25 18:44:07 --> Security Class Initialized
DEBUG - 2022-04-25 18:44:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:44:07 --> Input Class Initialized
INFO - 2022-04-25 18:44:07 --> Language Class Initialized
INFO - 2022-04-25 18:53:40 --> Config Class Initialized
INFO - 2022-04-25 18:53:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 18:53:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 18:53:40 --> Utf8 Class Initialized
INFO - 2022-04-25 18:53:40 --> URI Class Initialized
INFO - 2022-04-25 18:53:40 --> Router Class Initialized
INFO - 2022-04-25 18:53:40 --> Output Class Initialized
INFO - 2022-04-25 18:53:40 --> Security Class Initialized
DEBUG - 2022-04-25 18:53:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 18:53:40 --> Input Class Initialized
INFO - 2022-04-25 18:53:40 --> Language Class Initialized
ERROR - 2022-04-25 18:53:40 --> 404 Page Not Found: Actuator/health
INFO - 2022-04-25 19:05:00 --> Config Class Initialized
INFO - 2022-04-25 19:05:00 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:05:00 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:05:00 --> Utf8 Class Initialized
INFO - 2022-04-25 19:05:00 --> URI Class Initialized
INFO - 2022-04-25 19:05:00 --> Router Class Initialized
INFO - 2022-04-25 19:05:00 --> Output Class Initialized
INFO - 2022-04-25 19:05:00 --> Security Class Initialized
DEBUG - 2022-04-25 19:05:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:05:00 --> Input Class Initialized
INFO - 2022-04-25 19:05:00 --> Language Class Initialized
INFO - 2022-04-25 19:05:03 --> Config Class Initialized
INFO - 2022-04-25 19:05:03 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:05:03 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:05:03 --> Utf8 Class Initialized
INFO - 2022-04-25 19:05:03 --> URI Class Initialized
INFO - 2022-04-25 19:05:03 --> Router Class Initialized
INFO - 2022-04-25 19:05:03 --> Output Class Initialized
INFO - 2022-04-25 19:05:03 --> Security Class Initialized
DEBUG - 2022-04-25 19:05:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:05:03 --> Input Class Initialized
INFO - 2022-04-25 19:05:03 --> Language Class Initialized
ERROR - 2022-04-25 19:05:03 --> 404 Page Not Found: Auto-completejs/index
INFO - 2022-04-25 19:05:03 --> Config Class Initialized
INFO - 2022-04-25 19:05:03 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:05:03 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:05:03 --> Utf8 Class Initialized
INFO - 2022-04-25 19:05:03 --> URI Class Initialized
INFO - 2022-04-25 19:05:03 --> Router Class Initialized
INFO - 2022-04-25 19:05:03 --> Output Class Initialized
INFO - 2022-04-25 19:05:03 --> Security Class Initialized
DEBUG - 2022-04-25 19:05:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:05:03 --> Input Class Initialized
INFO - 2022-04-25 19:05:03 --> Language Class Initialized
ERROR - 2022-04-25 19:05:03 --> 404 Page Not Found: Auto-completejs/index
INFO - 2022-04-25 19:20:20 --> Config Class Initialized
INFO - 2022-04-25 19:20:20 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:20:20 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:20:20 --> Utf8 Class Initialized
INFO - 2022-04-25 19:20:20 --> URI Class Initialized
INFO - 2022-04-25 19:20:20 --> Router Class Initialized
INFO - 2022-04-25 19:20:20 --> Output Class Initialized
INFO - 2022-04-25 19:20:20 --> Security Class Initialized
DEBUG - 2022-04-25 19:20:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:20:20 --> Input Class Initialized
INFO - 2022-04-25 19:20:20 --> Language Class Initialized
ERROR - 2022-04-25 19:20:20 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 19:20:22 --> Config Class Initialized
INFO - 2022-04-25 19:20:22 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:20:22 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:20:22 --> Utf8 Class Initialized
INFO - 2022-04-25 19:20:22 --> URI Class Initialized
INFO - 2022-04-25 19:20:22 --> Router Class Initialized
INFO - 2022-04-25 19:20:22 --> Output Class Initialized
INFO - 2022-04-25 19:20:22 --> Security Class Initialized
DEBUG - 2022-04-25 19:20:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:20:22 --> Input Class Initialized
INFO - 2022-04-25 19:20:22 --> Language Class Initialized
ERROR - 2022-04-25 19:20:22 --> 404 Page Not Found: App-adstxt/index
INFO - 2022-04-25 19:22:38 --> Config Class Initialized
INFO - 2022-04-25 19:22:38 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:22:38 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:22:38 --> Utf8 Class Initialized
INFO - 2022-04-25 19:22:38 --> URI Class Initialized
DEBUG - 2022-04-25 19:22:38 --> No URI present. Default controller set.
INFO - 2022-04-25 19:22:38 --> Router Class Initialized
INFO - 2022-04-25 19:22:38 --> Output Class Initialized
INFO - 2022-04-25 19:22:38 --> Security Class Initialized
DEBUG - 2022-04-25 19:22:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:22:38 --> Input Class Initialized
INFO - 2022-04-25 19:22:38 --> Language Class Initialized
INFO - 2022-04-25 19:25:53 --> Config Class Initialized
INFO - 2022-04-25 19:25:53 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:25:53 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:25:53 --> Utf8 Class Initialized
INFO - 2022-04-25 19:25:53 --> URI Class Initialized
INFO - 2022-04-25 19:25:53 --> Router Class Initialized
INFO - 2022-04-25 19:25:53 --> Output Class Initialized
INFO - 2022-04-25 19:25:53 --> Security Class Initialized
DEBUG - 2022-04-25 19:25:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:25:53 --> Input Class Initialized
INFO - 2022-04-25 19:25:53 --> Language Class Initialized
INFO - 2022-04-25 19:29:20 --> Config Class Initialized
INFO - 2022-04-25 19:29:20 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:29:20 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:29:20 --> Utf8 Class Initialized
INFO - 2022-04-25 19:29:20 --> URI Class Initialized
DEBUG - 2022-04-25 19:29:20 --> No URI present. Default controller set.
INFO - 2022-04-25 19:29:20 --> Router Class Initialized
INFO - 2022-04-25 19:29:20 --> Output Class Initialized
INFO - 2022-04-25 19:29:20 --> Security Class Initialized
DEBUG - 2022-04-25 19:29:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:29:20 --> Input Class Initialized
INFO - 2022-04-25 19:29:20 --> Language Class Initialized
INFO - 2022-04-25 19:29:21 --> Config Class Initialized
INFO - 2022-04-25 19:29:21 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:29:21 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:29:21 --> Utf8 Class Initialized
INFO - 2022-04-25 19:29:21 --> URI Class Initialized
INFO - 2022-04-25 19:29:21 --> Router Class Initialized
INFO - 2022-04-25 19:29:21 --> Output Class Initialized
INFO - 2022-04-25 19:29:21 --> Security Class Initialized
DEBUG - 2022-04-25 19:29:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:29:21 --> Input Class Initialized
INFO - 2022-04-25 19:29:21 --> Language Class Initialized
ERROR - 2022-04-25 19:29:21 --> 404 Page Not Found: Faviconico/index
INFO - 2022-04-25 19:46:46 --> Config Class Initialized
INFO - 2022-04-25 19:46:46 --> Hooks Class Initialized
DEBUG - 2022-04-25 19:46:46 --> UTF-8 Support Enabled
INFO - 2022-04-25 19:46:46 --> Utf8 Class Initialized
INFO - 2022-04-25 19:46:46 --> URI Class Initialized
INFO - 2022-04-25 19:46:46 --> Router Class Initialized
INFO - 2022-04-25 19:46:46 --> Output Class Initialized
INFO - 2022-04-25 19:46:46 --> Security Class Initialized
DEBUG - 2022-04-25 19:46:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 19:46:46 --> Input Class Initialized
INFO - 2022-04-25 19:46:46 --> Language Class Initialized
INFO - 2022-04-25 20:07:40 --> Config Class Initialized
INFO - 2022-04-25 20:07:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 20:07:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 20:07:40 --> Utf8 Class Initialized
INFO - 2022-04-25 20:07:40 --> URI Class Initialized
INFO - 2022-04-25 20:07:40 --> Router Class Initialized
INFO - 2022-04-25 20:07:40 --> Output Class Initialized
INFO - 2022-04-25 20:07:40 --> Security Class Initialized
DEBUG - 2022-04-25 20:07:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 20:07:40 --> Input Class Initialized
INFO - 2022-04-25 20:07:40 --> Language Class Initialized
INFO - 2022-04-25 20:49:27 --> Config Class Initialized
INFO - 2022-04-25 20:49:27 --> Hooks Class Initialized
DEBUG - 2022-04-25 20:49:27 --> UTF-8 Support Enabled
INFO - 2022-04-25 20:49:27 --> Utf8 Class Initialized
INFO - 2022-04-25 20:49:27 --> URI Class Initialized
INFO - 2022-04-25 20:49:27 --> Router Class Initialized
INFO - 2022-04-25 20:49:27 --> Output Class Initialized
INFO - 2022-04-25 20:49:27 --> Security Class Initialized
DEBUG - 2022-04-25 20:49:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 20:49:27 --> Input Class Initialized
INFO - 2022-04-25 20:49:27 --> Language Class Initialized
INFO - 2022-04-25 21:37:24 --> Config Class Initialized
INFO - 2022-04-25 21:37:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:24 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:24 --> URI Class Initialized
DEBUG - 2022-04-25 21:37:24 --> No URI present. Default controller set.
INFO - 2022-04-25 21:37:24 --> Router Class Initialized
INFO - 2022-04-25 21:37:24 --> Output Class Initialized
INFO - 2022-04-25 21:37:24 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:24 --> Input Class Initialized
INFO - 2022-04-25 21:37:24 --> Language Class Initialized
INFO - 2022-04-25 21:37:24 --> Config Class Initialized
INFO - 2022-04-25 21:37:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:24 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:24 --> URI Class Initialized
DEBUG - 2022-04-25 21:37:24 --> No URI present. Default controller set.
INFO - 2022-04-25 21:37:24 --> Router Class Initialized
INFO - 2022-04-25 21:37:24 --> Output Class Initialized
INFO - 2022-04-25 21:37:24 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:24 --> Input Class Initialized
INFO - 2022-04-25 21:37:24 --> Language Class Initialized
INFO - 2022-04-25 21:37:24 --> Config Class Initialized
INFO - 2022-04-25 21:37:24 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:24 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:24 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:24 --> URI Class Initialized
DEBUG - 2022-04-25 21:37:24 --> No URI present. Default controller set.
INFO - 2022-04-25 21:37:24 --> Router Class Initialized
INFO - 2022-04-25 21:37:24 --> Output Class Initialized
INFO - 2022-04-25 21:37:24 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:24 --> Input Class Initialized
INFO - 2022-04-25 21:37:24 --> Language Class Initialized
INFO - 2022-04-25 21:37:25 --> Config Class Initialized
INFO - 2022-04-25 21:37:25 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:25 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:25 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:25 --> URI Class Initialized
DEBUG - 2022-04-25 21:37:25 --> No URI present. Default controller set.
INFO - 2022-04-25 21:37:25 --> Router Class Initialized
INFO - 2022-04-25 21:37:25 --> Output Class Initialized
INFO - 2022-04-25 21:37:25 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:25 --> Input Class Initialized
INFO - 2022-04-25 21:37:25 --> Language Class Initialized
INFO - 2022-04-25 21:37:25 --> Config Class Initialized
INFO - 2022-04-25 21:37:25 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:25 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:25 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:25 --> URI Class Initialized
DEBUG - 2022-04-25 21:37:25 --> No URI present. Default controller set.
INFO - 2022-04-25 21:37:25 --> Router Class Initialized
INFO - 2022-04-25 21:37:25 --> Output Class Initialized
INFO - 2022-04-25 21:37:25 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:25 --> Input Class Initialized
INFO - 2022-04-25 21:37:25 --> Language Class Initialized
INFO - 2022-04-25 21:37:30 --> Config Class Initialized
INFO - 2022-04-25 21:37:30 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:30 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:30 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:30 --> URI Class Initialized
INFO - 2022-04-25 21:37:30 --> Router Class Initialized
INFO - 2022-04-25 21:37:30 --> Output Class Initialized
INFO - 2022-04-25 21:37:30 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:30 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:30 --> Input Class Initialized
INFO - 2022-04-25 21:37:30 --> Language Class Initialized
INFO - 2022-04-25 21:37:32 --> Config Class Initialized
INFO - 2022-04-25 21:37:32 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:32 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:32 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:32 --> URI Class Initialized
INFO - 2022-04-25 21:37:32 --> Router Class Initialized
INFO - 2022-04-25 21:37:32 --> Output Class Initialized
INFO - 2022-04-25 21:37:32 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:32 --> Input Class Initialized
INFO - 2022-04-25 21:37:32 --> Language Class Initialized
ERROR - 2022-04-25 21:37:32 --> 404 Page Not Found: Auto-completejs/index
INFO - 2022-04-25 21:37:32 --> Config Class Initialized
INFO - 2022-04-25 21:37:32 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:32 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:32 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:32 --> URI Class Initialized
INFO - 2022-04-25 21:37:32 --> Router Class Initialized
INFO - 2022-04-25 21:37:32 --> Output Class Initialized
INFO - 2022-04-25 21:37:32 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:32 --> Input Class Initialized
INFO - 2022-04-25 21:37:32 --> Language Class Initialized
ERROR - 2022-04-25 21:37:32 --> 404 Page Not Found: Auto-completejs/index
INFO - 2022-04-25 21:37:34 --> Config Class Initialized
INFO - 2022-04-25 21:37:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:34 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:34 --> URI Class Initialized
INFO - 2022-04-25 21:37:34 --> Router Class Initialized
INFO - 2022-04-25 21:37:34 --> Output Class Initialized
INFO - 2022-04-25 21:37:34 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:34 --> Input Class Initialized
INFO - 2022-04-25 21:37:34 --> Language Class Initialized
ERROR - 2022-04-25 21:37:34 --> 404 Page Not Found: Contacthtml/index
INFO - 2022-04-25 21:37:35 --> Config Class Initialized
INFO - 2022-04-25 21:37:35 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:35 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:35 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:35 --> URI Class Initialized
INFO - 2022-04-25 21:37:35 --> Router Class Initialized
INFO - 2022-04-25 21:37:35 --> Output Class Initialized
INFO - 2022-04-25 21:37:35 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:35 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:35 --> Input Class Initialized
INFO - 2022-04-25 21:37:35 --> Language Class Initialized
INFO - 2022-04-25 21:37:39 --> Config Class Initialized
INFO - 2022-04-25 21:37:39 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:39 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:39 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:39 --> URI Class Initialized
INFO - 2022-04-25 21:37:39 --> Router Class Initialized
INFO - 2022-04-25 21:37:39 --> Output Class Initialized
INFO - 2022-04-25 21:37:39 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:39 --> Input Class Initialized
INFO - 2022-04-25 21:37:39 --> Language Class Initialized
ERROR - 2022-04-25 21:37:39 --> 404 Page Not Found: Abouthtml/index
INFO - 2022-04-25 21:37:40 --> Config Class Initialized
INFO - 2022-04-25 21:37:40 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:40 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:40 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:40 --> URI Class Initialized
INFO - 2022-04-25 21:37:40 --> Router Class Initialized
INFO - 2022-04-25 21:37:40 --> Output Class Initialized
INFO - 2022-04-25 21:37:40 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:40 --> Input Class Initialized
INFO - 2022-04-25 21:37:40 --> Language Class Initialized
INFO - 2022-04-25 21:37:44 --> Config Class Initialized
INFO - 2022-04-25 21:37:44 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:44 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:44 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:44 --> URI Class Initialized
INFO - 2022-04-25 21:37:44 --> Router Class Initialized
INFO - 2022-04-25 21:37:44 --> Output Class Initialized
INFO - 2022-04-25 21:37:44 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:44 --> Input Class Initialized
INFO - 2022-04-25 21:37:44 --> Language Class Initialized
INFO - 2022-04-25 21:37:47 --> Config Class Initialized
INFO - 2022-04-25 21:37:47 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:47 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:47 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:47 --> URI Class Initialized
INFO - 2022-04-25 21:37:47 --> Router Class Initialized
INFO - 2022-04-25 21:37:47 --> Output Class Initialized
INFO - 2022-04-25 21:37:47 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:47 --> Input Class Initialized
INFO - 2022-04-25 21:37:47 --> Language Class Initialized
INFO - 2022-04-25 21:37:50 --> Config Class Initialized
INFO - 2022-04-25 21:37:50 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:37:50 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:37:50 --> Utf8 Class Initialized
INFO - 2022-04-25 21:37:50 --> URI Class Initialized
INFO - 2022-04-25 21:37:50 --> Router Class Initialized
INFO - 2022-04-25 21:37:50 --> Output Class Initialized
INFO - 2022-04-25 21:37:50 --> Security Class Initialized
DEBUG - 2022-04-25 21:37:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:37:50 --> Input Class Initialized
INFO - 2022-04-25 21:37:50 --> Language Class Initialized
ERROR - 2022-04-25 21:37:50 --> 404 Page Not Found: Loginhtml/index
INFO - 2022-04-25 21:53:19 --> Config Class Initialized
INFO - 2022-04-25 21:53:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:53:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:53:19 --> Utf8 Class Initialized
INFO - 2022-04-25 21:53:19 --> URI Class Initialized
INFO - 2022-04-25 21:53:19 --> Router Class Initialized
INFO - 2022-04-25 21:53:19 --> Output Class Initialized
INFO - 2022-04-25 21:53:19 --> Security Class Initialized
DEBUG - 2022-04-25 21:53:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:53:19 --> Input Class Initialized
INFO - 2022-04-25 21:53:19 --> Language Class Initialized
ERROR - 2022-04-25 21:53:19 --> 404 Page Not Found: Well-known/apple-app-site-association
INFO - 2022-04-25 21:53:19 --> Config Class Initialized
INFO - 2022-04-25 21:53:19 --> Hooks Class Initialized
DEBUG - 2022-04-25 21:53:19 --> UTF-8 Support Enabled
INFO - 2022-04-25 21:53:19 --> Utf8 Class Initialized
INFO - 2022-04-25 21:53:19 --> URI Class Initialized
INFO - 2022-04-25 21:53:19 --> Router Class Initialized
INFO - 2022-04-25 21:53:19 --> Output Class Initialized
INFO - 2022-04-25 21:53:19 --> Security Class Initialized
DEBUG - 2022-04-25 21:53:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 21:53:19 --> Input Class Initialized
INFO - 2022-04-25 21:53:19 --> Language Class Initialized
ERROR - 2022-04-25 21:53:19 --> 404 Page Not Found: Apple-app-site-association/index
INFO - 2022-04-25 22:27:26 --> Config Class Initialized
INFO - 2022-04-25 22:27:26 --> Hooks Class Initialized
DEBUG - 2022-04-25 22:27:26 --> UTF-8 Support Enabled
INFO - 2022-04-25 22:27:26 --> Utf8 Class Initialized
INFO - 2022-04-25 22:27:26 --> URI Class Initialized
INFO - 2022-04-25 22:27:26 --> Router Class Initialized
INFO - 2022-04-25 22:27:26 --> Output Class Initialized
INFO - 2022-04-25 22:27:26 --> Security Class Initialized
DEBUG - 2022-04-25 22:27:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 22:27:26 --> Input Class Initialized
INFO - 2022-04-25 22:27:26 --> Language Class Initialized
ERROR - 2022-04-25 22:27:26 --> 404 Page Not Found: Env/index
INFO - 2022-04-25 22:27:27 --> Config Class Initialized
INFO - 2022-04-25 22:27:27 --> Hooks Class Initialized
DEBUG - 2022-04-25 22:27:27 --> UTF-8 Support Enabled
INFO - 2022-04-25 22:27:27 --> Utf8 Class Initialized
INFO - 2022-04-25 22:27:27 --> URI Class Initialized
DEBUG - 2022-04-25 22:27:27 --> No URI present. Default controller set.
INFO - 2022-04-25 22:27:27 --> Router Class Initialized
INFO - 2022-04-25 22:27:27 --> Output Class Initialized
INFO - 2022-04-25 22:27:27 --> Security Class Initialized
DEBUG - 2022-04-25 22:27:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 22:27:27 --> Input Class Initialized
INFO - 2022-04-25 22:27:27 --> Language Class Initialized
INFO - 2022-04-25 23:16:16 --> Config Class Initialized
INFO - 2022-04-25 23:16:16 --> Hooks Class Initialized
DEBUG - 2022-04-25 23:16:16 --> UTF-8 Support Enabled
INFO - 2022-04-25 23:16:16 --> Utf8 Class Initialized
INFO - 2022-04-25 23:16:16 --> URI Class Initialized
DEBUG - 2022-04-25 23:16:16 --> No URI present. Default controller set.
INFO - 2022-04-25 23:16:16 --> Router Class Initialized
INFO - 2022-04-25 23:16:16 --> Output Class Initialized
INFO - 2022-04-25 23:16:16 --> Security Class Initialized
DEBUG - 2022-04-25 23:16:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 23:16:16 --> Input Class Initialized
INFO - 2022-04-25 23:16:16 --> Language Class Initialized
INFO - 2022-04-25 23:33:44 --> Config Class Initialized
INFO - 2022-04-25 23:33:44 --> Hooks Class Initialized
DEBUG - 2022-04-25 23:33:44 --> UTF-8 Support Enabled
INFO - 2022-04-25 23:33:44 --> Utf8 Class Initialized
INFO - 2022-04-25 23:33:44 --> URI Class Initialized
DEBUG - 2022-04-25 23:33:44 --> No URI present. Default controller set.
INFO - 2022-04-25 23:33:44 --> Router Class Initialized
INFO - 2022-04-25 23:33:44 --> Output Class Initialized
INFO - 2022-04-25 23:33:44 --> Security Class Initialized
DEBUG - 2022-04-25 23:33:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 23:33:44 --> Input Class Initialized
INFO - 2022-04-25 23:33:44 --> Language Class Initialized
INFO - 2022-04-25 23:35:34 --> Config Class Initialized
INFO - 2022-04-25 23:35:34 --> Hooks Class Initialized
DEBUG - 2022-04-25 23:35:34 --> UTF-8 Support Enabled
INFO - 2022-04-25 23:35:34 --> Utf8 Class Initialized
INFO - 2022-04-25 23:35:34 --> URI Class Initialized
DEBUG - 2022-04-25 23:35:34 --> No URI present. Default controller set.
INFO - 2022-04-25 23:35:34 --> Router Class Initialized
INFO - 2022-04-25 23:35:34 --> Output Class Initialized
INFO - 2022-04-25 23:35:34 --> Security Class Initialized
DEBUG - 2022-04-25 23:35:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2022-04-25 23:35:34 --> Input Class Initialized
INFO - 2022-04-25 23:35:34 --> Language Class Initialized
