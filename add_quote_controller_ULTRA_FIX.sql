-- ADIM 1: Önceki hatalı girişi sil (varsa diye)
DELETE FROM `fl_admin_controllers` WHERE `Controller` = 'quote_requests';

-- ADIM 2: Controller'ı doğru şekilde ekle (Listings menüsü altına)
INSERT INTO `fl_admin_controllers` (`Parent_ID`, `Position`, `Key`, `Controller`) VALUES (2, 10, 'quote_requests', 'quote_requests');

-- ADIM 3: Dil anahtarını ekle
DELETE FROM `fl_lang_keys` WHERE `Key` = 'admin_controllers+name+quote_requests';
INSERT INTO `fl_lang_keys` (`Key`, `Module`, `Status`) VALUES ('admin_controllers+name+quote_requests', 'admin', 'active');

-- ADIM 4: Türkçe dil içeriğini ekle
DELETE FROM `fl_lang_content` WHERE `Key` = 'admin_controllers+name+quote_requests' AND `Code` = 'turkish';
INSERT INTO `fl_lang_content` (`Key`, `Code`, `Value`) VALUES ('admin_controllers+name+quote_requests', 'turkish', 'Teklif Talepleri');

-- ADIM 5: Sonucu kontrol et
SELECT * FROM `fl_admin_controllers` WHERE `Key` = 'quote_requests'; 