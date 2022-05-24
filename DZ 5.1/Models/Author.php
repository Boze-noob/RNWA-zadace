<?php


class Author
{
    public $rid;
    public $fullname;

    /**
     * Author constructor.
     * @param $rid
     * @param $fullname
     */
    public function __construct($rid, $fullname)
    {
        $this->rid = $rid;
        $this->fullname = $fullname;
    }

    public static function all() {
        $list = [];
        $req = Database::query("SELECT r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM registration r");
        foreach($req as $author) {
            $list[] = new Author($author['rid'], $author['fullname']);
        }
        return $list;
    }

    public static function find($pid) {
        $pid = intval($pid);
        $req = Database::query("SELECT r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM registration r where r.rid = $pid");
        $author = $req[0];
        return new Author($author['rid'], $author['fullname']);
    }


}