<?php
class Noticia {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listarTodas() {
        $sql = "SELECT * FROM noticias ORDER BY data_publicacao DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionar($titulo, $conteudo) {
        $stmt = $this->db->prepare("INSERT INTO noticias (titulo, conteudo) VALUES (?, ?)");
        return $stmt->execute([$titulo, $conteudo]);
    }
}
