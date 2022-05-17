<?php

namespace App\Http\Controllers;

use App\Exceptions\CommunityLinkAlreadySubmitted;
use App\Http\Requests\CommunityLinkForm;
use App\Models\Channel;
use App\Queries\CommunityLinksQuery;

class CommunityLinksController extends Controller
{
    public function index(Channel $channel = null)
    {
        $links = (new CommunityLinksQuery)->get(
            request()->exists('popular'), $channel
        );

        $channels = Channel::orderBy('title', 'asc')->get();

        return view('community.index', compact('links', 'channels', 'channel'));
    }

    public function store(CommunityLinkForm $form)
    {

        try {
            $form->persist();

            if (auth()->user()->isTrusted()){
                flash('Thanks for the contribution!', 'success')->important();
            } else {
                flash('Thanks!, This contribution will be reviewd shortly')->important();
            }
        } catch (CommunityLinkAlreadySubmitted $e) {
            flash(
                'That link has already been submitted,
                We will instead bump the timestamps and bring that link back to the top'
            );
        }

        return back();
    }

}
