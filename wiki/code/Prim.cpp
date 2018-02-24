#include <bits/stdc++.h>
#define FOR(i, a, b) for(int i = (a), _b = (b); i <= _b; ++i)
#define FORD(i,a ,b) for(int i = (a), _b = (b); i >= _b; --i)
#define ll long long
#define pb push_back
#define fi first
#define se second
using namespace std;
const int maxN = 1e4 + 10;
const int oo = 1e9 + 7;
int n, m;
typedef pair<int, int> ii;
vector<ii> a[maxN];
int d[maxN];
priority_queue<ii> q;
void prim(int s)
{
	int ans = 0;
	FOR(i, 1, n) d[i] = oo;
	d[s] = 0;
	q.push(ii(0, s));
	while(q.size())
	{
		int u = q.top().se;
		int du = -q.top().fi;
		q.pop();
		if(d[u] != du) continue;
		ans+=d[u]; d[u] = 0;
		FOR(i, 0, a[u].size() - 1)
		{
			int v = a[u][i].se;
			int l = a[u][i].fi;
			if(d[v] > d[u] + l)
			{
				d[v] = d[u] + l;
				q.push(ii(-d[v], v));
			}

		}
	}
	cout << ans;
}
int main()
{
	cin >> n >> m;
	int x, y, w;
	FOR(i, 1, m)
	{
		cin >> x >> y >> w;
		a[x].pb(ii(w, y));
		a[y].pb(ii(w, x));
	}
	prim(1);
	return 0;
}
/*
http://vn.spoj.com/problems/QBMST/
*/