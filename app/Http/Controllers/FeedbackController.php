<?php


namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Services\GoogleSheetService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected $googleSheetService;

    public function __construct(GoogleSheetService $googleSheetService)
    {
        $this->googleSheetService = $googleSheetService;
    }

    public function importFeedbackOne()
    {
        // Optionally, clear old feedback
        Feedback::truncate(); // This will delete all existing feedback records

        $data = $this->googleSheetService->getSheetData('Kuwago1!A2:F');

        foreach ($data as $row) {
            Feedback::create([
                'name' => $row[1],
                'feedback_type' => $row[2],
                'dish' => $row[3],
                'comments' => $row[4],
                'rating' => $row[5],
                'feedback_date' => \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $row[0]),
            ]);
        }

        return redirect()->route('general.kuwago-one.feedbacks')->with('success', 'Feedback imported successfully.');
    }

    public function importFeedbackTwo()
    {
        // Optionally, clear old feedback
        Feedback::truncate(); // This will delete all existing feedback records

        $data = $this->googleSheetService->getSheetData('Kuwago1!A2:F');

        foreach ($data as $row) {
            Feedback::create([
                'name' => $row[1],
                'feedback_type' => $row[2],
                'dish' => $row[3],
                'comments' => $row[4],
                'rating' => $row[5],
                'feedback_date' => \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $row[0]),
            ]);
        }

        return redirect()->route('general.kuwago-two.feedbacks')->with('success', 'Feedback imported successfully.');
    }

    public function index()
    {
        $feedback = Feedback::orderBy('feedback_date', 'desc')->get();
        $averageRating = $feedback->avg('rating');

        // Calculate the number of votes for each rating (1 to 5)
        $ratingCounts = [
            1 => $feedback->where('rating', 1)->count(),
            2 => $feedback->where('rating', 2)->count(),
            3 => $feedback->where('rating', 3)->count(),
            4 => $feedback->where('rating', 4)->count(),
            5 => $feedback->where('rating', 5)->count(),
        ];

        return view('feedback.index', compact('feedback', 'averageRating', 'ratingCounts'));
    }

    public function filterByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $feedback = Feedback::whereBetween('feedback_date', [$request->start_date, $request->end_date])->get();
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
