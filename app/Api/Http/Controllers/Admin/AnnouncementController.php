<?php
namespace App\Api\Http\Controllers\Admin;

use App\Announcements\Announcement;
use App\Announcements\AnnouncementRepository;
use App\Announcements\Requests\StoreAnnouncementRequest;
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
        $announcements = $this->announcements->findAllPaginated();

        return $this->response()->paginator($announcements, new AnnouncementTransformer());
    }

    public function store(StoreAnnouncementRequest $request)
    {
        $announcement = $this->announcements->create($this->auth()->user(), $request->all());

        return $this->response()->item($announcement, new AnnouncementTransformer());
    }

    public function delete(Announcement $announcement)
    {
        $this->announcements->delete($announcement);

        return $this->response()->noContent();
    }
}
