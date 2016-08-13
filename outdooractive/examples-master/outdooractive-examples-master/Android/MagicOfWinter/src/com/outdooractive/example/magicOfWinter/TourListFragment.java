package com.outdooractive.example.magicOfWinter;

import java.util.ArrayList;

import org.json.JSONObject;

import android.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import com.outdooractive.api.ObjectLoader;
import com.outdooractive.api.ObjectLoader.IObjectLoaderListener;
import com.outdooractive.api.TourList;
import com.outdooractive.api.TourList.TourHeader;

public class TourListFragment extends Fragment {

	private final ArrayList<TourHeader> tourList = new ArrayList<TourHeader>();
	private ListView listView;

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		String header = getArguments().getString("header");
		getActivity().getActionBar().setTitle(header);
		getActivity().getActionBar().show();

		View view = inflater.inflate(R.layout.tour_list_fragment, container,
				false);

		// handle list item click
		listView = (ListView) view.findViewById(R.id.tour_list_view);
		listView.setOnItemClickListener(new OnItemClickListener() {
			@Override
			public void onItemClick(AdapterView<?> parent, View view,
					int position, long id) {
				TourHeader item = tourList.get(position);
				((IActionListener) getActivity())
						.onOpenTourDetailsRequest(item);
			}
		});

		return view;
	}

	@Override
	public void onActivityCreated(Bundle savedInstanceState) {
		super.onActivityCreated(savedInstanceState);

		// load the list of tours to be displayed
		ObjectLoader objectLoader = new ObjectLoader(this.getActivity());
		objectLoader.setListener(new IObjectLoaderListener() {
			@Override
			public void onObjectLoaded(JSONObject object) {
				TourListFragment.this.setListItems(new TourList(object));
			}
		});
		objectLoader.loadTourList(getArguments().getInt("categoryId"));
	}

	private void setListItems(TourList tours) {
		if (getActivity() == null) {
			return;
		}

		// fill the view with tour list items
		tourList.clear();
		tourList.addAll(tours.getTours());
		ArrayAdapter<TourHeader> adapter = new ArrayAdapter<TourHeader>(
				getActivity(), R.layout.tour_list_item, tourList);
		listView.setAdapter(adapter);
	}
}
