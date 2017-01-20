<?php

class Blog_model extends CI_Model
{

    static $table = 'articles';

    public $rules = [
        'title' => [
            'field' => 'title',
            'rules' => 'trim|required|max_length[128]'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function getAllBlogArticles($order_by = 'ASC', $limit = null)
    {
        if ($order_by) {
            $this->db->order_by('id', $order_by);
        }
        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get(self::$table);

        return $query->result();
    }


    public function getArticleById($id = 0)
    {
        $this->db->where('id', $id);
        $result = $this->getAllBlogArticles(null, 1);
        return $result[0];
    }

    function get_new()
    {
        $result = new stdClass();
        $result->id = '';
        $result->title = '';
        $result->author = '';
        $result->date = '';
        $result->text = '';
        return $result;
    }

    function save_article($article)
    {
        $obj = $this->get_new();
        if ($article['id']) {
            $obj->id = $article['id'];
        }
        $obj->title = $article['title'];
        $obj->author = $article['author'];
        $obj->date = $article['date'];
        $obj->text = $article['text'];
        if ($article['id']) {
            $id = $this->update($obj);
        } else {
            $id = $this->insert($obj);
        }
        return $id;
    }


    function update ( $data )
    {
        $this->db->set($data);
        $this->db->where( 'id', $data->id );
        $this->db->update( self::$table );
        return $data->id;
    }
    function insert ( $data )
    {
        $this->db->set($data);
        $this->db->insert( self::$table );
        return $this->db->insert_id();
    }



}