-- Önce eski hatalı girişi sil (varsa)
DELETE FROM `fl_admin_controllers` WHERE `Controller` = 'quote_requests';

-- Doğru yapıyla ekle (Parent_ID=2 'Listings' menüsü altına, Position=10)
INSERT INTO `fl_admin_controllers` (`Parent_ID`, `Position`, `Key`, `Controller`, `Vars`) 
VALUES (2, 10, 'quote_requests', 'quote_requests', '');

-- Dil anahtarını ekle
INSERT INTO `fl_lang_keys` (`Key`, `Module`, `Status`) 
VALUES ('admin_controllers+name+quote_requests', 'admin', 'active')
ON DUPLICATE KEY UPDATE `Status`='active';

-- Türkçe dil içeriğini ekle
INSERT INTO `fl_lang_content` (`Key`, `Code`, `Value`) 
VALUES ('admin_controllers+name+quote_requests', 'turkish', 'Teklif Talepleri')
ON DUPLICATE KEY UPDATE `Value`='Teklif Talepleri';

-- İngilizce dil içeriğini ekle
INSERT INTO `fl_lang_content` (`Key`, `Code`, `Value`) 
VALUES ('admin_controllers+name+quote_requests', 'english', 'Quote Requests')
ON DUPLICATE KEY UPDATE `Value`='Quote Requests';

-- Sonucu kontrol et
SELECT * FROM `fl_admin_controllers` WHERE `Controller` = 'quote_requests'; 