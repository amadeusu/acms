<?php


namespace Admin\Model\Page;


use Engine\Model;

class PageRepository extends Model {
    /**
     * @return mixed
     */
    public function getPages() {
        $sql = $this->queryBuilder->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->sql();

        return $this->db->query($sql);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \ReflectionException
     */
    public function createPage($params) {
        $page = new Page;
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        $pageID = $page->save();

        return $pageID;
    }

    public function getPageData($id) {
        $page = new Page($id);

        return $page->findOne();
    }

    public function updatePage($params) {
        if (isset($params['page_id'])) {
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->save();
        }
    }
}