<?php


class Group
{
    public $group_id;
    public $group_name;
    public $group_info;
    public $group_type;
    public $group_creator;
    public $group_creator_id;
    public $group_members = [];

    /**
     * Post constructor.
     * @param $group_id
     * @param $group_name
     * @param $group_info
     * @param $group_type
     * @param $group_creator
     * @param $group_members
     */
    public function __construct($group_id, $group_name, $group_info, $group_type, $group_creator, $group_creator_id, $group_members)
    {
        $this->group_id = $group_id;
        $this->group_name = $group_name;
        $this->group_info = $group_info;
        $this->group_type = $group_type;
        $this->group_creator = $group_creator;
        $this->group_creator_id = $group_creator_id;
        $this->group_members = $group_members;
    }


    public static function all() {
        $list = [];
        $req = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS creator FROM creategroup p INNER JOIN registration r ON p.rid=r.rid");
        foreach($req as $group) {
            $gid = $group['gid'];
            $req2 = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM groupmembers p INNER JOIN registration r ON p.rid=r.rid where p.gid = '$gid'");
            foreach ($req2 as $member){
                $members[]=new Author($member['rid'],$member['fullname']);
            }
            $list[] = new Group($group['gid'], $group['grpname'],$group['grpinfo'], $group['grptype'], $group['creator'], $group['rid'], $members);
            $members =[];
        }
        return $list;
    }

    public static function find($pid) {
        $pid = intval($pid);
        $req = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS creator FROM creategroup p INNER JOIN registration r ON p.rid=r.rid where p.gid = $pid");
        $group = $req[0];
        $gid = $group['gid'];
        $req2 = Database::query("SELECT p.*, r.rid, CONCAT(r.fname, ' ', r.lname) AS fullname FROM groupmembers p INNER JOIN registration r ON p.rid=r.rid where p.gid = '$gid'");
        foreach ($req2 as $member){
            $members[]=new Author($member['rid'],$member['fullname']);
        }
        return new Group($group['gid'], $group['grpname'],$group['grpinfo'], $group['grptype'], $group['creator'], $group['rid'], $members);
    }

    public static function save($rid, $grpname,$grpinfo,$grptype, $members)
    {
        Database::query("insert into creategroup (rid,grpname,grpinfo,grptype) values ('$rid','$grpname','$grpinfo','$grptype')");
        $req = Database::query("SELECT * from creategroup");
        $group_id = $req[count($req)-1]['gid'];
        foreach ($members as $member){
            Database::query("insert into groupmembers (gid,rid) values ('$group_id', '$member')");
        }
    }

    public static function update($gid,$rid, $grpname,$grpinfo,$grptype,$members)
    {
        Database::query("update creategroup set grpname = '$grpname',grpinfo = '$grpinfo',grptype = '$grptype', rid = '$rid' where gid = '$gid'");

        Database::query("delete from groupmembers where gid = '$gid'");
        foreach ($members as $member){
            Database::query("insert into groupmembers (gid,rid) values ('$gid', '$member')");
        }
    }

    public static function delete($gid)
    {
        Database::query("delete from groupmembers where gid = '$gid'");
        Database::query("delete from creategroup where gid = '$gid'");
    }


}