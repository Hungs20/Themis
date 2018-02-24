#include <bits/stdc++.h>

using namespace std;

const int maxN = 1e3 + 10;
const int oo = 1e9 + 7;
int n, m, k;
int d[maxN], par[maxN];
typedef pair<int,int> ii;
vector<ii> a[maxN];
vector<int> res;
priority_queue<ii> q;
void dijkstra(int s, int t)
{
	for(int i = 1; i <= n; ++i) d[i] = oo;
	d[s] = 0;
	q.push(ii(0, s));
	while(q.size())
	{
		int u = q.top().second;
		int du = -q.top().first;
		q.pop();
		if(d[u] != du) continue;
		for(int i = 0; i < a[u].size(); ++i)
		{
			int v = a[u][i].second;
			int l = a[u][i].first;
			if(d[v] > d[u] + l)
			{
				d[v] = d[u] + l;
				par[v] = u;
				q.push(ii(-d[v], v));
			}
		}
	}
}
void edge(int s, int t)
{
	res.clear();
	while(t != s && t != 0)
	{
		res.push_back(t);
		t = par[t];
	}
	res.push_back(s);
	cout << (int)res.size() << " ";
	for(int i = res.size() - 1; i >= 0; --i) cout << res[i] << " ";
	cout << "\n";

}
int main()
{
	cin >> n >> m >> k;
	int u, v, w;
	for(int i = 1; i <= m; ++i)
	{
		cin >> u >> v >> w;
		a[u].push_back(ii(w, v));
		a[v].push_back(ii(w, u));
	}
	for(int i = 1; i <= k; ++i)
	{
		cin >> w >> u >> v;
		dijkstra(u, v);
		if(w == 0) cout << d[v] <<"\n";
		else edge(u, v);
	}

	return 0;
}

/*
http://vn.spoj.com/problems/FLOYD/
*/