<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockGroupClusterRequest;
use App\Http\Requests\UpdateStockGroupClusterRequest;
use App\Repositories\StockGroupClusterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockGroupClusterController extends AppBaseController
{
    /** @var  StockGroupClusterRepository */
    private $stockGroupClusterRepository;

    public function __construct(StockGroupClusterRepository $stockGroupClusterRepo)
    {
        $this->stockGroupClusterRepository = $stockGroupClusterRepo;
    }

    /**
     * Display a listing of the StockGroupCluster.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockGroupClusters = $this->stockGroupClusterRepository->all();

        return view('stock_group_clusters.index')
            ->with('stockGroupClusters', $stockGroupClusters);
    }

    /**
     * Show the form for creating a new StockGroupCluster.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_group_clusters.create');
    }

    /**
     * Store a newly created StockGroupCluster in storage.
     *
     * @param CreateStockGroupClusterRequest $request
     *
     * @return Response
     */
    public function store(CreateStockGroupClusterRequest $request)
    {
        $input = $request->all();

        $stockGroupCluster = $this->stockGroupClusterRepository->create($input);

        Flash::success('Stock Group Cluster saved successfully.');

        return redirect(route('stockGroupClusters.index'));
    }

    /**
     * Display the specified StockGroupCluster.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            Flash::error('Stock Group Cluster not found');

            return redirect(route('stockGroupClusters.index'));
        }

        return view('stock_group_clusters.show')->with('stockGroupCluster', $stockGroupCluster);
    }

    /**
     * Show the form for editing the specified StockGroupCluster.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            Flash::error('Stock Group Cluster not found');

            return redirect(route('stockGroupClusters.index'));
        }

        return view('stock_group_clusters.edit')->with('stockGroupCluster', $stockGroupCluster);
    }

    /**
     * Update the specified StockGroupCluster in storage.
     *
     * @param int $id
     * @param UpdateStockGroupClusterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockGroupClusterRequest $request)
    {
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            Flash::error('Stock Group Cluster not found');

            return redirect(route('stockGroupClusters.index'));
        }

        $stockGroupCluster = $this->stockGroupClusterRepository->update($request->all(), $id);

        Flash::success('Stock Group Cluster updated successfully.');

        return redirect(route('stockGroupClusters.index'));
    }

    /**
     * Remove the specified StockGroupCluster from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockGroupCluster = $this->stockGroupClusterRepository->find($id);

        if (empty($stockGroupCluster)) {
            Flash::error('Stock Group Cluster not found');

            return redirect(route('stockGroupClusters.index'));
        }

        $this->stockGroupClusterRepository->delete($id);

        Flash::success('Stock Group Cluster deleted successfully.');

        return redirect(route('stockGroupClusters.index'));
    }
}
