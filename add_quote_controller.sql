-- Quote Requests Controller'ını Admin paneline ekleme

-- Önce mevcut olup olmadığını kontrol et
SELECT * FROM fl_admin_controllers WHERE Controller = 'quote_requests';

-- Eğer yoksa ekle
INSERT INTO fl_admin_controllers (Controller, Menu_id, name, Plugin, Status, Position) 
VALUES ('quote_requests', 3, 'Teklif Talepleri', NULL, 'active', 100)
ON DUPLICATE KEY UPDATE 
    Menu_id = 3, 
    name = 'Teklif Talepleri', 
    Status = 'active', 
    Position = 100;

-- Dil tablosuna da ekle (Türkçe)
INSERT INTO fl_lang_keys (Key, Module, Status, Readonly, Plugin) 
VALUES ('admin_controllers+name+quote_requests', 'admin', 'active', 0, NULL)
ON DUPLICATE KEY UPDATE Status = 'active';

INSERT INTO fl_lang_content (Key, Code, Value, Module, Status, Plugin) 
VALUES ('admin_controllers+name+quote_requests', 'turkish', 'Teklif Talepleri', 'admin', 'active', NULL)
ON DUPLICATE KEY UPDATE Value = 'Teklif Talepleri';

-- İngilizce
INSERT INTO fl_lang_content (Key, Code, Value, Module, Status, Plugin) 
VALUES ('admin_controllers+name+quote_requests', 'english', 'Quote Requests', 'admin', 'active', NULL)
ON DUPLICATE KEY UPDATE Value = 'Quote Requests';

-- Sonucu kontrol et
SELECT * FROM fl_admin_controllers WHERE Controller = 'quote_requests'; 