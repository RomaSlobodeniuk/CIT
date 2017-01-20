<?php

class Blog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model', 'articles');
    }

    function index()
    {
        $this->data->title = 'The blog';
        $this->data->template = 'blog';

        $result = $this->articles->getAllBlogArticles();
        $this->data->data_from_db = [];

        foreach ($result as $article) {
            array_push($this->data->data_from_db, [
                'id' => $article->id,
                'title' => $article->title,
                'author' => $article->author,
                'date' => $article->date,
                'text' => $article->text
            ]);
        }
        $this->load->view("components/layout", ['my_data' => $this->data]);
    }

    function page($id)
    {
        if (empty($id)) {
            header('Location: http://localhost/04_test_files/CIT/blog/');
            return;
        }
        $this->data->template = 'blog_single';

        $article = $this->articles->getArticleById($id);
        if(!$article){
            header('Location: http://localhost/04_test_files/CIT/blog/');
        }
        $this->data->title = $article->title;
        $this->data->data_from_db = [
            'title' => $article->title,
            'author' => $article->author,
            'date' => $article->date,
            'text' => $article->text
        ];
        $this->load->view('components/layout', ['my_data' => $this->data]);
    }

    function add () {
        $this->data->data_from_db = $this->articles->get_new();
        $this->data->template = 'blog_add';
        $this->data->title = 'Add';
        $this->load->view('components/layout', [ 'my_data' => $this->data ]);

//        echo '<pre>';
//        print_r($this->data);
//        echo '</pre>';

    }

    function edit ( $id = null )
    {
        if ( empty($id) )
        {
            header( 'Location: http://localhost/04_test_files/CIT/blog/index' );
        }
        $this->data->data_from_db = $this->articles->getArticleById($id);
        $this->data->template = 'blog_add';
        $this->data->title = 'Edit';
        $this->load->view('components/layout', [ 'my_data' => $this->data ]);
    }

    function save ()
    {
        if ( $this->input->post() ) {
            $rules = $this->articles->rules;
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ( $this->form_validation->run() == true ) {
                $id = $this->articles->save_article( $this->input->post() );
                header( 'Location: http://localhost/04_test_files/CIT/blog/page/'. $id );
            } else
            {
                header( 'Location: http://localhost/04_test_files/CIT/blog/' );
            }
        } else
        {
            header( 'Location: http://localhost/04_test_files/CIT/blog/' );
        }
    }


}