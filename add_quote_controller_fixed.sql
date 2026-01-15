-- Quote Requests Controller'ını doğru şekilde ekleme

-- Önce kontrol et
SELECT * FROM fl_admin_controllers WHERE Controller = 'quote_requests';

-- Doğru yapıyla ekle (Parent_ID=2 listings altına, Position=10)
INSERT INTO fl_admin_controllers (Parent_ID, Position, Key, Controller, Vars) 
VALUES (2, 10, 'quote_requests', 'quote_requests', '')
ON DUPLICATE KEY UPDATE 
    Parent_ID = 2, 
    Position = 10, 
    Key = 'quote_requests',
    Controller = 'quote_requests',
    Vars = '';

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