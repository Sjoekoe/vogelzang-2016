<?php
namespace App\Api\Http\Controllers;

use App\Announcements\AnnouncementRepository;
use App\Api\Announcements\AnnouncementTransformer;
use App\Api\Http\Controller;

class AnnouncementController extends Controller
{
    /**
     * @var \App\Announcements\AnnouncementRepository
     */
    private $announcements;

    public function __construct(AnnouncementRepository $announcements)
    {
        $this->announcements = $announcements;
    }

    public function index()
    {
        $announcements = $this->announcements->findAllVisible();

        return $this->response()->collection($announcements, new AnnouncementTransformer());
    }
}
