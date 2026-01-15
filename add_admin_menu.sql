-- Admin menüsüne Teklif Talepleri menü item'ini ekle

-- Önce mevcut kaydı kontrol et ve varsa sil
DELETE FROM `fl_admin_menu` WHERE `Key` = 'quote_requests';

-- Yeni menu item ekle
INSERT INTO `fl_admin_menu` (
    `Key`, 
    `Position`, 
    `Status`, 
    `Module`
) VALUES (
    'quote_requests', 
    85, 
    'active', 
    'general'
);

-- Dil anahtarlarını ekle (Türkçe ve İngilizce)
INSERT INTO `fl_lang_keys` (`Key`, `Code`, `Value`, `Module`) VALUES
('admin_menu+name+quote_requests', 'turkish', 'Teklif Talepleri', 'general'),
('admin_menu+name+quote_requests', 'english', 'Quote Requests', 'general'),
('admin_menu+title+quote_requests', 'turkish', 'Müşteri teklif taleplerini yönetin', 'general'),
('admin_menu+title+quote_requests', 'english', 'Manage customer quote requests', 'general'),
('quote_requests', 'turkish', 'Teklif Talepleri', 'general'),
('quote_requests', 'english', 'Quote Requests', 'general'),
('quote_requests_management', 'turkish', 'Teklif Talepleri Yönetimi', 'general'),
('quote_requests_management', 'english', 'Quote Requests Management', 'general'),
('quote_status_updated', 'turkish', 'Teklif durumu güncellendi', 'general'),
('quote_status_updated', 'english', 'Quote status updated', 'general'),
('quote_invalid_data', 'turkish', 'Geçersiz veri', 'general'),
('quote_invalid_data', 'english', 'Invalid data', 'general'),
('quote_deleted', 'turkish', 'Teklif silindi', 'general'),
('quote_deleted', 'english', 'Quote deleted', 'general')
ON DUPLICATE KEY UPDATE Value = VALUES(Value);

-- Cache'i temizle (isteğe bağlı)
-- DELETE FROM `fl_cache` WHERE `Key` LIKE '%admin_menu%'; 