#include <bits/stdc++.h>

#define FOR(i, a, b) for(int i = (a), _b = (b); i <= _b; ++i)
#define FORD(i,a ,b) for(int i = (a), _b = (b); i >= _b; --i)
#define ll long long
#define pb push_back
#define fi first
#define se second
using namespace std;

const int maxN = 1e5 + 10;
int n, m, par[maxN];
typedef pair<int, int> ii;
typedef pair<int, ii> iii;
vector<iii> edge;
int ans;
int fpar(int u)
{
	return (u == par[u]) ? u : fpar(par[u]);
}
void join(int u, int v)
{
	par[fpar(u)] = fpar(v);
}
int main()
{
	cin >> n >> m;
	int x, y, w;
	FOR(i, 1, n) par[i] = i;
	FOR(i, 1, m) {
		cin >> x >> y >> w;
		edge.pb(iii(w, ii(x, y)));
	}
	sort(edge.begin(), edge.end());
	for(int i = 0; i < edge.size(); ++i)
	{
		int l = edge[i].fi;
		int u = edge[i].se.fi;
		int v = edge[i].se.se;
		if(fpar(u) != fpar(v)) {
			join(u, v);
			ans += l;
		}
	}
	cout << ans;
	return 0;
}
/*
http://vn.spoj.com/problems/QBMST/
*/