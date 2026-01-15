-- =================================================================
-- KESİN ÇÖZÜM SQL - LÜTFEN SORGULARI TEKER TEKER ÇALIŞTIRIN
-- =================================================================

-- ADIM 1: `quote_requests` ile ilgili TÜM ESKİ KAYITLARI SİL
DELETE FROM `fl_admin_controllers` WHERE `Key` = 'quote_requests';

-- ADIM 2: TEK BİR DOĞRU KAYIT EKLE (Listings menüsü altına)
INSERT INTO `fl_admin_controllers` (`Parent_ID`, `Position`, `Key`, `Controller`) VALUES (2, 99, 'quote_requests', 'quote_requests');

-- ADIM 3: DİL ANAHTARINI TEMİZLE VE YENİDEN EKLE
DELETE FROM `fl_lang_keys` WHERE `Key` = 'admin_controllers+name+quote_requests';
INSERT INTO `fl_lang_keys` (`Key`, `Module`, `Status`) VALUES ('admin_controllers+name+quote_requests', 'admin', 'active');

-- ADIM 4: TÜRKÇE DİL İÇERİĞİNİ TEMİZLE VE YENİDEN EKLE
DELETE FROM `fl_lang_content` WHERE `Key` = 'admin_controllers+name+quote_requests' AND `Code` = 'turkish';
INSERT INTO `fl_lang_content` (`Key`, `Code`, `Value`) VALUES ('admin_controllers+name+quote_requests', 'turkish', 'Teklif Talepleri');

-- ADIM 5: İNGİLİZCE DİL İÇERİĞİNİ TEMİZLE VE YENİDEN EKLE
DELETE FROM `fl_lang_content` WHERE `Key` = 'admin_controllers+name+quote_requests' AND `Code` = 'english';
INSERT INTO `fl_lang_content` (`Key`, `Code`, `Value`) VALUES ('admin_controllers+name+quote_requests', 'english', 'Quote Requests');

-- ADIM 6: SONUCU KONTROL ET (Sadece 1 satır görmelisiniz)
SELECT * FROM `fl_admin_controllers` WHERE `Key` = 'quote_requests'; 