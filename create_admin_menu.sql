-- Admin menu tablosunu oluştur ve teklif talepleri menüsünü ekle

-- 1. Admin menu tablosunu oluştur
CREATE TABLE IF NOT EXISTS `fl_admin_menu` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `Key` varchar(50) NOT NULL,
    `Position` int(11) NOT NULL DEFAULT '0',
    `Status` enum('active','approval') NOT NULL DEFAULT 'active',
    `Module` varchar(50) NOT NULL DEFAULT 'general',
    PRIMARY KEY (`ID`),
    UNIQUE KEY `Key` (`Key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 2. Quote requests menü item'ini ekle
INSERT INTO `fl_admin_menu` (`Key`, `Position`, `Status`, `Module`) VALUES
('quote_requests', 85, 'active', 'general')
ON DUPLICATE KEY UPDATE `Status` = 'active', `Position` = 85;

-- 3. Dil anahtarlarını ekle
INSERT INTO `fl_lang_keys` (`Key`, `Code`, `Value`, `Module`) VALUES
('admin_menu+name+quote_requests', 'turkish', 'Teklif Talepleri', 'general'),
('admin_menu+name+quote_requests', 'english', 'Quote Requests', 'general'),
('quote_requests', 'turkish', 'Teklif Talepleri', 'general'),
('quote_requests', 'english', 'Quote Requests', 'general')
ON DUPLICATE KEY UPDATE `Value` = VALUES(`Value`);

-- 4. Cache'i temizle (isteğe bağlı)
DELETE FROM `fl_cache` WHERE `Key` LIKE '%admin_menu%' OR `Key` LIKE '%lang%'; 