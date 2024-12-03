<?php

namespace App\Http\Controllers;

use App\Models\UddesignFeedback;
use App\Services\UdGoogleSheetsService;
use Illuminate\Http\Request;

class UddesignFeedbackController extends Controller
{
    protected $googleSheetsService;

    public function __construct(UdGoogleSheetsService $googleSheetsService)
    {
        $this->googleSheetsService = $googleSheetsService;
    }

    public function fetchAndStoreFeedback()
    {
        UddesignFeedback::truncate();
        $feedbackData = $this->googleSheetsService->getSheetData('Uddesign!A2:F');

        foreach ($feedbackData as $feedback) {
            UddesignFeedback::create([
                'name' => $feedback[1],
                'feedback_type' => $feedback[2],
                'product_name' => $feedback[3],
                'comments' => $feedback[4],
                'rating' => (int)$feedback[5],
                'feedback_date' => \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $feedback[0]),
            ]);
        }

        return redirect()->route('general.uddesign.feedbacks')->with('success', 'Feedback saved successfully!');
    }

    

    public function index()
    {
        $feedback = UddesignFeedback::orderBy('feedback_date', 'desc')->get();
        $averageRating = $feedback->avg('rating');

        // Calculate the number of votes for each rating (1 to 5)
        $ratingCounts = [
            1 => $feedback->where('rating', 1)->count(),
            2 => $feedback->where('rating', 2)->count(),
            3 => $feedback->where('rating', 3)->count(),
            4 => $feedback->where('rating', 4)->count(),
            5 => $feedback->where('rating', 5)->count(),
        ];

        return view('general.uddesign.feedbacks', compact('feedback', 'averageRating', 'ratingCounts'));
    }


    public function filterByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $feedback = UddesignFeedback::whereBetween('feedback_date', [$request->start_date, $request->end_date])->get();
        $averageRating = $feedback->avg('rating');

        $ratingCounts = [
            1 => $feedback->where('rating', 1)->count(),
            2 => $feedback->where('rating', 2)->count(),
            3 => $feedback->where('rating', 3)->count(),
            4 => $feedback->where('rating', 4)->count(),
            5 => $feedback->where('rating', 5)->count(),
        ];

        return response()->json([
            'averageRating' => $averageRating,
            'ratingCounts' => $ratingCounts,
            'comments' => $feedback->where('feedback_type', 'Comment')->values(),
            'suggestions' => $feedback->where('feedback_type', 'Suggestion')->values(),
            'complaints' => $feedback->where('feedback_type', 'Complaint')->values(),
        ]);
    }
}
